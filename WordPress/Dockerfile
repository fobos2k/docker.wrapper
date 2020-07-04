# FROM nginx
FROM debian
LABEL maintainer="fobos2k@gmail.com"

ENV DEBIAN_FRONTEND noninteractive

# Install packages
RUN apt-get update
COPY apt-requirements.txt /tmp/
RUN sed 's/#.*//' /tmp/apt-requirements.txt | xargs apt-get install -y
RUN rm -rf /var/lib/apt/lists/*

# Copy configs
COPY conf/nginx-default /etc/nginx/sites-available/default
COPY conf/php.ini /etc/php/7.3/fpm/php.ini
COPY conf/sql_init.sql /tmp/

# Worpress
ADD https://wordpress.org/latest.tar.gz /tmp/
RUN tar -xf /tmp/latest.tar.gz --strip-components=1 -C /var/www/html/
COPY conf/wp-config.php /var/www/html/
COPY conf/primewp.1.0.7.zip /tmp/
RUN unzip /tmp/primewp.1.0.7.zip -d /var/www/html/wp-content/themes/ && rm /tmp/primewp.1.0.7.zip

# Clean and start
RUN service mysql start && mysql -u root < /tmp/sql_init.sql

RUN rm -f /tmp/apt-requirements.txt /tmp/latest.tar.gz /tmp/sql_init.sql
CMD service php7.3-fpm start && \
    service mysql start && \
    service nginx start && bash
