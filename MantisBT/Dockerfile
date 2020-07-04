FROM ubuntu:latest
LABEL maintainer="fobos2k@gmail.com"

# Environment
ENV DEBIAN_FRONTEND noninteractive
ARG APP_FS

# Update/Install packages
COPY apt-requirements.txt /tmp/
RUN apt-get update && \
    sed 's/#.*//' /tmp/apt-requirements.txt | xargs apt-get install -y && \
    rm -rf /var/lib/apt/lists/*

EXPOSE 80
RUN systemctl enable nginx

CMD /bin/bash
