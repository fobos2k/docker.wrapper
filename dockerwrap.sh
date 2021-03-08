#!/bin/bash

. ./_env.sh

print_environment()
{
    logger_debug "Execute project: ${PROJECT}"
    logger_debug "Environment:"
    logger_debug "\tPATH_TO_PROJECT = ${PATH_TO_PROJECT}"
    logger_debug "\tCONTAINER_USER = ${CONTAINER_USER}"
    logger_debug "\tVERBOSE = ${VERBOSE}"
}

using_library()
{
    LIBRARY_NAME=$1
    LIBRARY_FULL_PATH=${PATH_TO_LIBRARIES}/${LIBRARY_NAME}.sh
    if [ ! -e ${LIBRARY_FULL_PATH} ]; then
        echo "ERROR! Library was not found (${LIBRARY_NAME})..."
        exit 1
    fi
    . ${LIBRARY_FULL_PATH}
}

check_environment()
{
    logger_start_function $@

    # Path to projects
    [ -z ${PATH_TO_PROJECT} ] && logger_fail "Empty path to project..."
    [ ! -d ${PATH_TO_PROJECT} ] && logger_fail "Incorrect path (${PATH_TO_PROJECT})..."
    PATH_TO_PROJECT=$(realpath ${PATH_TO_PROJECT})

    # Project
    [ -z ${PROJECT} ] && logger_fail "Empty project name..."
    [ ! -d ${PATH_TO_PROJECT}/${PROJECT} ] && logger_fail "Project folder not exists (${PATH_TO_PROJECT}/${PROJECT})..."
    [ ! -e ${PATH_TO_PROJECT}/${PROJECT}/${PROJECT_ENV} ] && logger_fail "Project environment not found (${PATH_TO_PROJECT}/${PROJECT}/${PROJECT_ENV})..."

    print_environment

    logger_end_function
}

run_project()
{
    check_docker
    [ ! $? -eq 0 ] && exit 1

    start_docker

    logger_info "Aplly the project environment (${PROJECT}/${PROJECT_ENV})..."
    . ${PATH_TO_PROJECT}/${PROJECT}/${PROJECT_ENV}

    cd ${PATH_TO_PROJECT}/${PROJECT}
    [ ! $(is_image_present) ] && create_image

    run_container

    cd ${BASE_PATH}
}

main()
{
    using_library liboptions
    using_library liblogger
    using_library libdockerwrap

    get_verbose $@
    [ ${VERBOSE} ] && WITH_VERBOSE=" (with VERBOSE option)"
    logger_info "Starting${WITH_VERBOSE}..."

    get_environment $@

    check_environment

    run_project
}

main $@
