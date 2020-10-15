#!/bin/bash

LIBDOCKER=../libdocker.sh
ENV_FILE=_env.sh

help_usage()
{
    echo "Make Docker image for Qt5 development"
    echo "-----------------------------------------------------------------------------"
    echo "$0 [<options>]"
    echo -e "OPTIONS:"
    echo -e "\t-u | --user=<username> \t\t\t -- username for session"
    echo -e "\t-e | --environment=<path_to_environment> -- path to the environment script (default: ./_env.sh)"
    echo -e "\t-v | --verbose \t\t\t\t -- make the operation more talkative"
    echo -e "\t-h | --help \t\t\t\t -- this help"
    echo ""
}


main()
{

    [ ! -e ${LIBDOCKER} ] && echo "ERROR: ${LIBDOCKER} not found!.." && exit 1
    . ${LIBDOCKER}

    [ ! -e ${ENV_FILE} ] && echo "ERROR: environment (${ENV_FILE}) not found!.." && exit 1
    . ${ENV_FILE}

    export ROOTFS=${TEMP}/rootfs

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
