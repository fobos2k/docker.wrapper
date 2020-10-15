#!/usr/bin/env bash

# Image parameters
export IMAGE_NAME=qt5_develop
export IMAGE_VERSION=0.1.0
export IMAGE_REQUIREMENTS=apt-requirements.txt

# Container parameters
export CONTAINER_SUFFIX=container

# User
export DOCKER_USER=$(id -un)
export DOCKER_HOMEFS=./fs
export USER_WORKSPACE=
export USER_SSH_DIR=${HOME}/.ssh

# Misc
export VERBOSE=
export TEMP=./temp
export LOGS=${TEMP}/logs
export FAKE_ROOTFS=${TEMP}/fakeroot_${IMAGE_NAME}_${IMAGE_VERSION}


# Commands
mkdir -p ${DOCKER_HOMEFS}
mkdir -p ${TEMP}
mkdir -p ${LOGS}
mkdir -p ${FAKE_ROOTFS}
