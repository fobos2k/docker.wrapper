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
