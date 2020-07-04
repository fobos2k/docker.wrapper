#!/bin/bash

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
