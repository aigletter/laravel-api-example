FROM php:8.3-fpm
LABEL authors="aigletter"

ARG UID
ARG GID

ENV UID=${UID:-1000}
ENV GID=${GID:-1000}

COPY .docker/php/php.ini /usr/local/etc/php/
COPY .docker/php/docker.conf /usr/local/etc/php-fpm.d/docker.conf

# mix
RUN apt-get update \
  && apt-get install -y build-essential zlib1g-dev default-mysql-client curl gnupg procps nano git unzip libzip-dev libpq-dev

RUN docker-php-ext-install zip pdo_mysql

WORKDIR /var/www
COPY ./ /var/www/

RUN addgroup --system -gid ${GID} laravel
RUN adduser --system --ingroup laravel --shell /bin/bash --uid ${UID} --home /home/laravel laravel

RUN sed -i "s/user = www-data/user = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = laravel/g" /usr/local/etc/php-fpm.d/www.conf

EXPOSE 5173
USER laravel
