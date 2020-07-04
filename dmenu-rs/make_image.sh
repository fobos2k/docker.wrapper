#!/bin/bash

LIBDOCKER=../libdocker.sh
ENV_FILE=_env.sh
APT_REQUIREMENTS=apt-requirements.txt

help_usage()
{
    echo "Make Docker image"
    echo "-----------------------------------------------------------------------------"
    echo "$0 [<options>]"
    echo -e "OPTIONS:"
    echo -e "\t-u | --user=<username> \t\t\t -- username for session"
    echo -e "\t-e | --environment=<path_to_environment> -- path to the environment script (default: ./_env.sh)"
    echo -e "\t-v | --verbose \t\t\t\t -- make the operation more talkative"
    echo -e "\t-h | --help \t\t\t\t -- this help"
    echo ""
}

create_image()
{
    [ ${VERBOSE} ] && echo "${FUNCNAME[*]}()..."
    APT_PACKAGES=$(sed 's/#.*//' ${APT_REQUIREMENTS} | xargs)
    DOCKER_CMD="docker build                                            \
                    --tag=${IMAGE_NAME}:${IMAGE_VERSION}                \
                    --build-arg APP_USER=${DOCKER_USER}                 \
                    --build-arg APP_ROOTFS=${ROOTFS}                    \
                    --build-arg APP_APT_PACKAGES='${APT_PACKAGES}'      \
                    ./"
    [ ${VERBOSE} ] && echo ${DOCKER_CMD}
    eval ${DOCKER_CMD}

    rm -rf ${ROOTFS}

    DOCKER_CMD="docker tag ${IMAGE_NAME}:${IMAGE_VERSION} ${IMAGE_NAME}:latest"
    [ ${VERBOSE} ] && echo ${DOCKER_CMD}
    eval ${DOCKER_CMD}

    return 0
}

main()
{

    [ ! -e ${LIBDOCKER} ] && echo "ERROR: ${LIBDOCKER} not found!.." && exit 1
    . ${LIBDOCKER}

    [ ! -e ${ENV_FILE} ] && echo "ERROR: environment (${ENV_FILE}) not found!.." && exit 1
    . ${ENV_FILE}

    export ROOTFS=${TEMP}/rootfs
    mkdir -p ${ROOTFS}

    while [ -n $1 ]; do
        PARAM=`echo $1 | awk -F= '{print $1}'`
        VALUE=`echo $1 | awk -F= '{print $2}'`

        case ${PARAM} in
            -h | --help)
                help_usage
                exit
                ;;
            -e | --environment)
                ENV_FILE=${VALUE}
                [ ! -e ${ENV_FILE} ] && echo "ERROR: environment (${ENV_FILE}) not found!.." && exit 1
                . ${ENV_FILE}
                break
                ;;
            -u | --user)
                export DOCKER_USER=${VALUE}
                ;;
            -v | --verbose)
                export VERBOSE=1
                ;;
            *)
                # help_usage
                break
                ;;
        esac
        shift
    done

    [ ${VERBOSE} ] && echo "Enabled debug output..."

    check_docker
    [ ! $? -eq 0 ] && exit 1

    start_docker

    if [ ${VERBOSE} ]; then
        time create_image
    else
        create_image
    fi
}

main $@
