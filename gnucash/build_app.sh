#!/bin/bash

LIBDOCKER=../libdocker.sh
ENV_FILE=_env.sh

help_usage()
{
    echo "Interactive container using"
    echo "-----------------------------------------------------------------------------"
    echo "$0 [<options>]"
    echo -e "OPTIONS:"
    echo -e "\t-w | --workspace=<path_to_userworkspace> -- path to the user's workspace with sources"
    echo -e "\t-s | --suffix=<container_suffix> \t -- suffix for container name"
    echo -e "\t-e | --environment=<path_to_environment> -- path to the environment script (default: ./_env.sh)"
    echo -e "\t-v | --verbose \t\t\t\t -- make the operation more talkative"
    echo -e "\t-h | --help \t\t\t\t -- this help"
    echo ""
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
    fi

    DOCKER_CMD="docker run \
                       --tty --interactive --rm \
                       --mount type=bind,source=${USER_WORKSPACE},destination=/home/${DOCKER_USER}/workspace,consistency=cached \
                       --name ${CONTAINER_NAME} \
                       ${IMAGE_NAME}:${IMAGE_VERSION}"

    [ ${VERBOSE} ] && echo "${DOCKER_CMD}"
    eval ${DOCKER_CMD}
    [ ! $? -eq 0 ] && exit 1

    return 0
}

main()
{
    [ ! -e ${LIBDOCKER} ] && echo "ERROR: ${LIBDOCKER} not found!.." && exit 1
    . ${LIBDOCKER}

    [ ! -e ${ENV_FILE} ] && echo "ERROR: environment (${ENV_FILE}) not found!.." && exit 1
    . ${ENV_FILE}

    export CONTAINER_SUFFIX=interactive

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
            -w | --workspace)
                USER_WORKSPACE=${VALUE}
                [ ! -d ${USER_WORKSPACE} ] && echo "ERROR: ${USER_WORKSPACE} is not a directory..." && exit 1
                ;;
            -s | --suffix)
                export CONTAINER_SUFFIX=${VALUE}
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

    if [ ${VERBOSE} ]; then
        echo "Enabled debug output..."
        echo "LibDocker: $(realpath ${LIBDOCKER}) ..."
        echo "Environment: $(realpath ${ENV_FILE}) ..."
    fi

    check_docker
    [ ! $? -eq 0 ] && exit 1

    start_docker

    is_image_present
    [ ! $? -eq 0 ] && exit 1

    run_container
    echo "Bye..."
}

main $@
