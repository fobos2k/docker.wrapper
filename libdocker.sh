#!/usr/bin/env bash

ROOT_PATH=$(pwd)

check_docker()
{
    [ ${VERBOSE} ] && echo "${FUNCNAME[*]}()..."

    if [ -z $(which docker) ]; then
        echo "ERROR! Docker is not installed!.."
        return 1
    fi

    if groups $(id -nu) | grep -qw docker; then
        return 0
    fi

    echo "Current user will be added to the docker group..."
    sudo usermod -aG docker $(id -nu)
    su - $(id -nu)
    return 1
}

start_docker()
{
    [ ${VERBOSE} ] && echo "${FUNCNAME[*]}()..."
    which service 2>&1
    if [ $? -eq 0 ]; then
        [ ${VERBOSE} ] && echo "Use service command..."
        [[ ! $(service docker status) = *"running"* ]] && sudo service docker start
    else
        [ ${VERBOSE} ] && echo "Use systemctl command..."
        [ ! $(systemctl is-active docker.service) = "active" ] && sudo systemctl start docker.service
    fi
}

is_image_present()
{
    [ ${VERBOSE} ] && echo "${FUNCNAME[*]}()..."

    echo "Checking ${IMAGE_NAME}:${IMAGE_VERSION}..."
    IMAGE_ID=$(docker images -q ${IMAGE_NAME}:${IMAGE_VERSION})
    if [ ! ${IMAGE_ID} ]; then
        echo "ERROR! Image ${IMAGE_NAME}:${IMAGE_VERSION} not found..."
        return 1
    fi

    return 0
}

get_extra_package()
{
    [ ${VERBOSE} ] && echo "${FUNCNAME[*]}()..."

    # Format:
    # get_extra_package <package_name> <package_version> [<package_root>|-] [<strip_level>]
    #
    # Examples:
    #
    # Get CMake v.3.17.3 and extract to the root (/) without top folder
    #   get_extra_package cmake 3.17.3 - 1
    # Get Linaro toolchain v.7.1.1 and extract to the /opt
    #   get_extra_package linaro 7.1.1 /opt

    PACKAGE_NAME=$1
    PACKAGE_VERSION=$2
    [ $3 ] && PACKAGE_ROOT=$3 || PACKAGE_ROOT=
    [ $4 ] && STRIP_LEVEL=$4 || STRIP_LEVEL=0

    PACKAGE_URL=$(grep ${PACKAGE_NAME} ${EXTRA_PACKAGES_LIST} | grep ${PACKAGE_VERSION} | awk '{ print $2; }')
    [ ${VERBOSE} ] && echo "URL: ${PACKAGE_URL}"

    PACKAGE_CHECKSUM=$(grep ${PACKAGE_NAME} ${EXTRA_PACKAGES_LIST} | grep ${PACKAGE_VERSION} | awk '{ print $1; }')
    PACKAGE_FILENAME=${DOWNLOADS}/$(basename ${PACKAGE_URL})
    if [ ! ${PACKAGE_ROOT} = "-" ]; then
        PACKAGE_ROOT=${FAKE_ROOTFS}${PACKAGE_ROOT}
    else
        PACKAGE_ROOT=${FAKE_ROOTFS}
    fi

    if [ ${VERBOSE} ]; then
        echo "Getting of ${PACKAGE_NAME} (v.${PACKAGE_VERSION}):"
        echo -e "\tURL: ${PACKAGE_URL}"
        echo -e "\tChecksum: ${PACKAGE_CHECKSUM}"
    fi

    if [ ${PACKAGE_URL} ]; then
        WGET_CMD="wget -q --show-progress -c -O ${PACKAGE_FILENAME} ${PACKAGE_URL}"
        [ ${VERBOSE} ] && echo "${WGET_CMD}"
        eval ${WGET_CMD}
    fi

    CHECKSUM_CALC=$(sha256sum ${PACKAGE_FILENAME} | awk '{ print $1; }')
    [ ${VERBOSE} ] && echo "Checksum: ${CHECKSUM_CALC}"
    [ ! ${CHECKSUM_CALC} = ${PACKAGE_CHECKSUM} ] && return 1

    extract_package ${PACKAGE_FILENAME} ${PACKAGE_ROOT} ${STRIP_LEVEL}
    [ ! $? -eq 0 ] && echo "ERROR!"
}

extract_package()
{
    [ ${VERBOSE} ] && echo "${FUNCNAME[*]}()..."
    PACKAGE_FILENAME=$1
    [ $2 ] && PACKAGE_ROOT=$2 || PACKAGE_ROOT=${FAKE_ROOTFS}
    [ $3 ] && STRIP_LEVEL=$3 || STRIP_LEVEL=0

    if [ ${VERBOSE} ]; then
        echo "Package: ${PACKAGE_FILENAME}"
        echo " RootFS: ${PACKAGE_ROOT}"
        echo "  Strip: ${STRIP_LEVEL}"
    fi

    [ ! ${PACKAGE_ROOT} ] && return 1

    STRIP_COMPONENTS=
    [ ! ${STRIP_LEVEL} -eq 0 ] && STRIP_COMPONENTS="--strip-components ${STRIP_LEVEL}"

    [ ${VERBOSE} ] && echo "Extract ${PACKAGE_FILENAME} to ${PACKAGE_ROOT}..."
    mkdir -p ${PACKAGE_ROOT}
    if [[ "${PACKAGE_FILENAME}" == *".tar."* ]]; then
        TAR_CMD="tar -xf ${PACKAGE_FILENAME} ${STRIP_COMPONENTS} -C ${PACKAGE_ROOT}/"
        [ ${VERBOSE} ] && echo "${TAR_CMD}"
        eval ${TAR_CMD}
        return $?
    fi
}

print_environment()
{
    echo "---Build Environment---------------------------------------------------------"
    echo -e "\tImage:\t\t\t${IMAGE_NAME} (v.${IMAGE_VERSION})"
    echo -e "\tUser:\t\t\t${DOCKER_USER}"
    echo -e "\tSSH key:\t\t${SSH_KEY}"
    echo "-----------------------------------------------------------------------------"
}

create_image()
{
    [ ${VERBOSE} ] && echo "${FUNCNAME[*]}()..."

    print_environment
   
    APT_PACKAGES=$(sed 's/#.*//' ${IMAGE_REQUIREMENTS} | xargs)
    DOCKER_CMD="docker build                                            \
                    --tag=${IMAGE_NAME}:${IMAGE_VERSION}                \
                    --build-arg APP_USER=${DOCKER_USER}                 \
                    --build-arg APP_HOMEFS=${DOCKER_HOMEFS}             \
                    --build-arg APP_ROOTFS=${FAKE_ROOTFS}               \
                    --build-arg APP_APT_PACKAGES='${APT_PACKAGES}'      \
                    ./"
    [ ${VERBOSE} ] && echo ${DOCKER_CMD}
    eval ${DOCKER_CMD}

    # Clear  Fake rootFS
    rm -rf ${FAKE_ROOTFS}

    DOCKER_CMD="docker tag ${IMAGE_NAME}:${IMAGE_VERSION} ${IMAGE_NAME}:latest"
    [ ${VERBOSE} ] && echo ${DOCKER_CMD}
    eval ${DOCKER_CMD}

    return 0
}

run_container()
{
    [ ${VERBOSE} ] && echo "${FUNCNAME[*]}()..."

    export CONTAINER_NAME=${IMAGE_NAME}_${IMAGE_VERSION}_${CONTAINER_SUFFIX}

    if [ ${VERBOSE} ]; then
        echo "         Image: ${IMAGE_NAME}:${IMAGE_VERSION}"
        echo "          User: ${DOCKER_USER}"
        echo "Container name: ${CONTAINER_NAME}"
        echo "     Workspace: ${USER_WORKSPACE}"
        echo "           SSH: ${USER_SSH_DIR}"
    fi

    DOCKER_CMD="docker run \
                       --tty --interactive --rm \
                       --mount type=bind,source=${USER_WORKSPACE},destination=/home/${DOCKER_USER}/workspace,consistency=cached \
                       --mount type=bind,source=${USER_SSH_DIR},destination=/home/${DOCKER_USER}/.ssh,consistency=cached \
                       --name ${CONTAINER_NAME} \
                       ${IMAGE_NAME}:${IMAGE_VERSION}"

    [ ${VERBOSE} ] && echo ${DOCKER_CMD}
    eval ${DOCKER_CMD}
    [ ! $? -eq 0 ] && exit 1

    return 0
}
