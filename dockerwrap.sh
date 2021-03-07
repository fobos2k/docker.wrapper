#!/bin/bash

export PATH_TO_LIBRARIES=_lib
export PATH_TO_PROJECTS=_projects
export CONTAINER_USER=$(id -un)
export PROJECT=
export VERBOSE=

help_usage()
{
    logger_info "Create/run the docker containers for development sandboxes"
    logger_info "-----------------------------------------------------------------------------"
    logger_info "$0 [<options>] [<project>]"
    logger_info "OPTIONS:"
    logger_info "\t-p | --projects=<path_to_projects> \t -- path to the folder with projects"
    logger_info "\t-u | --user=<username> \t\t\t -- username for session"
    logger_info "\t-v | --verbose \t\t\t\t -- make the operation more talkative"
    logger_info "\t-h | --help \t\t\t\t -- this help"
}

print_environment()
{
    logger_debug "Run command: ${COMMAND}"
    logger_debug "Environment:"
    logger_debug "\tPATH_TO_PROJECTS = ${PATH_TO_PROJECTS}"
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
    print_environment

    # Path to projects
    [ -z ${PATH_TO_PROJECTS} ] && logger_fail "Empty path to projects..."
    [ ! -d ${PATH_TO_PROJECTS} ] && logger_fail "Incorrect path (${PATH_TO_PROJECTS})..."

    # Project
    [ -z ${PROJECT} ] && logger_fail "Empty project name..."
    [ ! -d ${PATH_TO_PROJECTS}/${PROJECT} ] && logger_fail "Project folder not exists (${PATH_TO_PROJECTS}/${PROJECT})..."
}

main()
{
    using_library liboptions
    using_library liblogger
    using_library libdockerwrap

    get_verbose $@

    logger_debug "Verbose = ${OPTION_VERBOSE[@]}"

    logger_info "Starting (verbose = ${VERBOSE})..."

    get_environment $@

    check_environment

    run_command
}

main $@
