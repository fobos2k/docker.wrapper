#!/bin/bash 

get_timestamp()
{
    echo -e -n $(date +'%g-%m-%d %R:%S.%3N')
}

get_log_prefix()
{
    LOG_LEVEL=$(echo $1 | awk '{print toupper($0)}')
    case ${LOG_LEVEL} in
        D | I | W | E )
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
    
    # echo -n -e "${LOG_LEVEL}" | awk '{print toupper($0)}'

    COUNTER=1
    for ARG in $@; do
        case ${COUNTER} in
            1)
                LOG_PREFIX=$(get_log_prefix ${ARG})
                [ -z "${LOG_PREFIX}" ] && break
                echo -n -e ${LOG_PREFIX}
                ;;
            *)
                echo -e -n " ${ARG}"
                ;;
        esac
        COUNTER+=1
    done

    echo -e "\n"
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

logger_debug()
{
    logger "D" $@
}
