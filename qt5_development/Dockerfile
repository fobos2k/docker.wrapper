FROM ubuntu:latest
LABEL maintainer="fobos2k@gmail.com"

# Environment
ARG APP_USER
ARG APP_APT_PACKAGES
ARG APP_HOMEFS
ARG APP_ROOTFS

ENV DEBIAN_FRONTEND nointeractive
ENV APP_WORKSPACE   /home/${APP_USER}/workspace
ENV APP_USER_SHELL  /usr/bin/zsh

# Update/Install packages
RUN apt-get update && \
    apt-get install -y ${APP_APT_PACKAGES}; \
    useradd -m -U $APP_USER; \
    echo "en_US.UTF-8 UTF-8" >> /etc/locale.gen; \
    locale-gen

# RootFs and workarounds
ADD ${APP_ROOTFS} /

# Userspace
USER ${APP_USER}
ADD ${APP_HOMEFS} /home/${APP_USER}/
RUN sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)"; \
    mkdir -p ${APP_WORKSPACE}

# Entrypoint
CMD cd ${APP_WORKSPACE} && ${APP_USER_SHELL}
