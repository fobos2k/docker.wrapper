#!/bin/bash

PATH_TO_LIBRARIES=_lib

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

main()
{
    using_library liblogger
    using_library libdockerwrap

    logger_debug "Starting..."
}

main $@
