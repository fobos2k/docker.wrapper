FROM ubuntu:bionic
LABEL maintainer="fobos2k@gmail.com"

# Arguments
ARG APP_USER
ARG APP_ROOTFS
ARG APP_APT_PACKAGES
ARG APP_CMAKE_URL
ENV DEBIAN_FRONTEND noninteractive
ENV APP_WORKSPACE /home/${APP_USER}/workspace
ENV APP_SRC_DIR ${APP_WORKSPACE}/gnucash
ENV APP_BUILD_DIR ${APP_WORKSPACE}/_build/gnucash
ENV APP_OPT_DIR ${APP_WORKSPACE}/_opt/gnucash

# Update/Install packages
RUN apt-get update && \
    apt-get install -y ${APP_APT_PACKAGES}; \
    useradd -m -U $APP_USER; \
    echo "en_US.UTF-8 UTF-8" > /etc/locale.gen; \
    locale-gen

# RootFs and workarounds
ADD ${APP_ROOTFS} /

# Userspace
USER ${APP_USER}
RUN sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)"

# Entrypoint
ENTRYPOINT mkdir -p ${APP_BUILD_DIR} && \
    mkdir -p ${APP_OPT_DIR} && \
    cd ${APP_BUILD_DIR} && \
    cmake -DCMAKE_INSTALL_PREFIX=${APP_OPT_DIR} ${APP_SRC_DIR} && \
    make && make install

