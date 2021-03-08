#!/usr/bin/env

export IMAGE_NAME=i3wm
export IMAGE_VERSION=0.0.1

create_image()
{
    logger_start_function $@

    APT_PACKAGES=$(get_apt_list ${APT_REQUIREMENTS_LIST})
    if [ ! -z ${APT_PACKAGES} ]; then
        logger_info "Will be installed ${#APT_PACKAGES[@]} APT packages."
        logger_debug "APT packages: ${APT_PACKAGES}"
    else
        logger_info "The APT packages are not in use..."
    fi

    DOCKER_CMD="docker build"
    DOCKER_CMD+=" --tag=${IMAGE_NAME}:${IMAGE_VERSION}"
    DOCKER_CMD+=" --build-arg APP_USER=${CONTAINER_USER}"
    DOCKER_CMD+=" --build-arg APP_HOMEFS=$(pwd)/${CONTAINER_HOMEFS}"
    DOCKER_CMD+=" --build-arg APP_ROOTFS=$(pwd)/${CONTAINER_ROOTFS}"
    DOCKER_CMD+=" --build-arg APP_APT_PACKAGES='${APT_PACKAGES}'"
    DOCKER_CMD+=" ./"
    logger_debug "CMD: ${DOCKER_CMD}"
    eval ${DOCKER_CMD}
    [ $? -ne 0 ] && logger_fail "Docker image was not created..."

    logger_end_function
}
