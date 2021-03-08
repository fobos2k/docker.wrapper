#!/usr/bin/env

# Global constraints
export PATH_TO_LIBRARIES=_lib
export PATH_TO_PROJECT=_projects
export TEMP=temp
export LOGS=${TEMP}/logs
export VERBOSE=
export BASE_PATH=$(pwd)

# Packages defaults
export APT_REQUIREMENTS_TXT=apt-requirements.txt

# Project defaults
export PROJECT=
export CONTAINER_USER=$(id -un)
export CONTAINER_HOMEFS=homefs
export CONTAINER_ROOTFS=rootfs
export CONTAINER_SUFFIX=container
export PROJECT_ENV=env.sh
export USER_WORKSPACE=
