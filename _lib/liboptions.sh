#!/bin/bash

IFS='|'
read -ra OPTION_PATH_TO_PROJECTS <<< "-p|--projects"
read -ra OPTION_USERNAME <<< "-u|--user"
read -ra OPTION_VERBOSE <<< "-v|--verbose"
read -ra OPTION_HELP <<< "-h|--help"
IFS=' '

get_verbose()
{
    [[ "$@" == *"${OPTION_VERBOSE[0]}"* ]] && VERBOSE=1
    [[ "$@" == *"${OPTION_VERBOSE[1]}"* ]] && VERBOSE=1
}

get_option_value()
{
    PARAM=$(echo $1 | awk -F= '{ print $1 }')
    if [ $(is_long_option ${PARAM}) ]; then
        VALUE=$(echo $1 | awk -F= '{ print $2 }')
    elif [ $(is_short_option ${PARAM}) ]; then
        VALUE=$2
    else
        VALUE=
    fi
}

is_simple_option()
{
    [[ $1 = ${OPTION_VERBOSE[0]} || $1 = ${OPTION_VERBOSE[1]} ]] && echo 1
    [[ $1 = ${OPTION_HELP[0]} || $1 = ${OPTION_HELP[1]} ]] && echo 1
}

is_long_option()
{
    [ $1 = ${OPTION_PATH_TO_PROJECTS[1]} ] && echo 1
    [ $1 = ${OPTION_USERNAME[1]} ] && echo 1
}

is_short_option()
{
    [ $1 = ${OPTION_PATH_TO_PROJECTS[0]} ] && echo 1
    [ $1 = ${OPTION_USERNAME[0]} ] && echo 1
}

get_environment()
{
    for ARG in $@; do
        PARAM=$(echo $1 | awk -F= '{ print $1 }')
        [ -z ${PARAM} ] && break

        logger_debug "List: $@"

        if [ $(is_long_option ${PARAM}) ]; then
            logger_debug "\tNext long option"
            VALUE=$(echo $1 | awk -F= '{ print $2 }')
        elif [ $(is_short_option ${PARAM}) ]; then
            logger_debug "\tNext short option"
            VALUE=$2
            shift
        else
            VALUE=
        fi

        logger_debug "Parsed: ${PARAM} = ${VALUE}"

        case ${PARAM} in
            ${OPTION_PATH_TO_PROJECTS[0]} | ${OPTION_PATH_TO_PROJECTS[1]})
                PATH_TO_PROJECTS=${VALUE}
                ;;
            ${OPTION_USERNAME[0]} | ${OPTION_USERNAME[1]} )
                CONTAINER_USER=${VALUE}
                ;;
            ${OPTION_VERBOSE[0]} | ${OPTION_VERBOSE[1]})
                VERBOSE=1
                ;;
            ${OPTION_HELP[0]} | ${OPTION_HELP[1]})
                help_usage
                exit 0
                ;;
            *)
                if [ ${PARAM:0:1} = "-" ]; then
                    logger_error "Unknown option: ${PARAM}"
                    help_usage
                    exit 0
                else
                    PROJECT=${PARAM}
                    break
                fi
                ;;
        esac
        shift
    done
}
