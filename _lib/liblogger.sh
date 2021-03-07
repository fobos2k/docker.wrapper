#!/bin/bash 

get_timestamp()
{
    echo -e -n $(date +'%g-%m-%d %R:%S.%3N')
}

get_log_prefix()
{
    LOG_LEVEL=$(echo $1 | awk '{print toupper($0)}')
    case ${LOG_LEVEL} in
        D | I | W | E | F)
            LOG_PREFIX="$(get_timestamp) "
            LOG_PREFIX+=$(echo ${LOG_LEVEL} | awk '{print toupper($0)}')
            ;;
        *)
            LOG_PREFIX=
            ;;
    esac
    echo ${LOG_PREFIX}
}

logger()
{
    LOG_LEVEL=$1
    
    COUNTER=1
    for ARG in $@; do
        case ${COUNTER} in
            1)
                LOG_PREFIX=$(get_log_prefix ${ARG})
                [ -z "${LOG_PREFIX}" ] && break
                echo -en ${LOG_PREFIX}
                ;;
            *)
                echo -en " ${ARG}"
                ;;
        esac
        let COUNTER++
    done
    echo -en "\n"
}

logger_info()
{
    logger "I" $@
}

logger_warning()
{
    logger "W" $@
}

logger_error()
{
    logger "E" $@
}

logger_fail()
{
    logger "F" $@
    exit 1
}

logger_debug()
{
    if [ ${VERBOSE} ]; then
        logger "D" $@
    fi
}
