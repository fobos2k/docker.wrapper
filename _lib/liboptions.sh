#!/bin/bash

IFS='|'
read -ra OPTION_PROJECT <<< "-p|--project"
read -ra OPTION_USERNAME <<< "-u|--user"
read -ra OPTION_VERBOSE <<< "-v|--verbose"
read -ra OPTION_HELP <<< "-h|--help"
IFS=' '


help_usage()
{
    logger_info "Create/run the docker containers for development sandboxes"
    logger_info "-----------------------------------------------------------------------------"
    logger_info "$0 [<options>] [<project>]"
    logger_info "OPTIONS:"
    logger_info "\t${OPTION_PROJECT[0]} | ${OPTION_PROJECT[1]}=<path_to_project> \t -- path to the folder with project"
    logger_info "\t${OPTION_USERNAME[0]} | ${OPTION_USERNAME[1]}=<username> \t\t\t -- username for session"
    logger_info "\t${OPTION_VERBOSE[0]} | ${OPTION_VERBOSE[1]} \t\t\t\t -- make the operation more talkative"
    logger_info "\t${OPTION_HELP[0]} | ${OPTION_HELP[1]} \t\t\t\t -- this help"
}


get_verbose()
{
    [[ "$@" == *"${OPTION_VERBOSE[0]}"* ]] && VERBOSE=1
    [[ "$@" == *"${OPTION_VERBOSE[1]}"* ]] && VERBOSE=1
}

is_simple_option()
{
    [[ $1 = ${OPTION_VERBOSE[0]} || $1 = ${OPTION_VERBOSE[1]} ]] && echo 1
    [[ $1 = ${OPTION_HELP[0]} || $1 = ${OPTION_HELP[1]} ]] && echo 1
}

is_long_option()
{
    [ $1 = ${OPTION_PROJECT[1]} ] && echo 1
    [ $1 = ${OPTION_USERNAME[1]} ] && echo 1
}

is_short_option()
{
    [ $1 = ${OPTION_PROJECT[0]} ] && echo 1
    [ $1 = ${OPTION_USERNAME[0]} ] && echo 1
}

get_environment()
{
    logger_start_function $@

    for ARG in $@; do
        PARAM=$(echo $1 | awk -F= '{ print $1 }')
        [ -z ${PARAM} ] && break

        logger_debug "List: $@"

        if [ $(is_long_option ${PARAM}) ]; then
            logger_debug "\tNext long option"
            VALUE=$(echo $1 | awk -F= '{ print $2 }')
        elif [[ $(is_short_option ${PARAM}) && "$2" != "-"* ]]; then
            logger_debug "\tNext short option"
            VALUE=$2
            shift
        else
            VALUE=
        fi

        logger_debug "Parsed: ${PARAM} = ${VALUE}"

        case ${PARAM} in
            ${OPTION_PROJECT[0]} | ${OPTION_PROJECT[1]})
                PATH_TO_PROJECT=${VALUE}
                ;;
            ${OPTION_USERNAME[0]} | ${OPTION_USERNAME[1]} )
                CONTAINER_USER=${VALUE}
                ;;
            ${OPTION_VERBOSE[0]} | ${OPTION_VERBOSE[1]})
                VERBOSE=1
                ;;
            ${OPTION_HELP[0]} | ${OPTION_HELP[1]})
                help_usage

                logger_end_function
                exit 0
                ;;
            *)
                if [ ${PARAM:0:1} = "-" ]; then
                    logger_error "Unknown option: ${PARAM}"
                    help_usage

                    logger_end_function
                    exit 0
                else
                    PROJECT=${PARAM}
                    break
                fi
                ;;
        esac
        shift
    done

    logger_end_function
}
