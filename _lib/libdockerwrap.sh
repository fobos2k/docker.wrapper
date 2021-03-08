#!/bin/bash

check_docker()
{
    logger_start_function $@

    if [ -z $(which docker) ]; then
        logger_error "Docker is not installed!.."

        logger_end_function
        return 1
    fi

    if groups $(id -nu) | grep -qw docker; then

        logger_end_function
        return 0
    fi

    logger_info "Current user will be added to the docker group..."
    sudo usermod -aG docker $(id -nu)
    su - $(id -nu)

    logger_end_function
    return 1
}

start_docker()
{
    logger_start_function $@

    which service > /dev/null 2>&1
    if [ $? -eq 0 ]; then
        logger_debug "Use service command..."
        [[ ! $(service docker status) = *"running"* ]] && sudo service docker start
    else
        logger_debug "Use systemctl command..."
        [ ! $(systemctl is-active docker.service) = "active" ] && sudo systemctl start docker.service
    fi

    logger_info "Docker engine running..."

    logger_end_function
}

is_image_present()
{
    docker images -q ${IMAGE_NAME}:${IMAGE_VERSION}
}

get_apt_list()
{
    [ -z $1 ] && APT_LIST=${APT_REQUIREMENTS_TXT} || APT_LIST=$1

    if [ -e ${APT_LIST} ]; then
        PACKAGES=$(sed 's/#.*//' ${APT_LIST} | xargs)
    else
        PACKAGES=
    fi

    echo ${PACKAGES}
}
