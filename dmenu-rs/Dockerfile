# FROM debian:stable
FROM ubuntu:bionic
LABEL maintainer="fobos2k@gmail.com"

# Arguments
ARG APP_USER
# ARG APP_FS
# ARG APP_TOOLCHAIN_DIR
ARG APP_ROOTFS
ARG APP_APT_PACKAGES
ENV DEBIAN_FRONTEND noninteractive
ENV APP_WORKSPACE /home/${APP_USER}/workspace

# Update/Install packages
# COPY apt-requirements.txt /tmp/
RUN apt-get update && \
    apt-get install -y ${APP_APT_PACKAGES}; \
    useradd -m -U $APP_USER; \
    echo "en_US.UTF-8 UTF-8" > /etc/locale.gen; \
    locale-gen

# RootFs and workarounds
ADD ${APP_ROOTFS} /

# Userspace
USER ${APP_USER}
RUN sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)"; \
    mkdir -p ${APP_WORKSPACE}; \
    echo ". ${HOME}/flir_start.sh > /dev/null 2>&1" >> /home/${APP_USER}/.zshrc

# Entrypoint
CMD cd ${APP_WORKSPACE} && /usr/bin/zsh
