FROM php:7.0-fpm-alpine
MAINTAINER Yoan Blanc <yoan@dosimple.ch>

EXPOSE 80 6001

RUN set -xe \
    && apk add --no-cache \
        acl \
        autoconf \
        curl \
        g++ \
        gcc \
        git \
        icu-dev \
        libc-dev \
        libtool \
        imagemagick-dev \
        make \
        mysql-dev \
        nodejs \
        postgresql-dev \
        python \
        supervisor \
        tini \
    # Native modules
    && docker-php-ext-install \
        intl \
        pcntl \
        pdo_mysql \
        pdo_pgsql \
    # PECL modules
    && pecl install \
        apcu \
        imagick \
        redis \
        xdebug \
    && docker-php-ext-enable \
        apcu \
        imagick \
        redis \
        # Enabling xdebug makes composer slow.
        #xdebug \
    # NPM global packages
    && npm install -g \
        gulp \
        node-gyp \
    # Clean up
    && apk del \
        autoconf \
        gcc \
        libc-dev \
        libtool \
    && rm -rf /var/cache/apk/* \
    # Composer
    && \
        curl -sS https://getcomposer.org/installer | \
            php -- --install-dir=/usr/local/bin --filename=composer

# Supervisord stuff
COPY docker/supervisord.conf /etc/supervisord.conf

# User stuff.
RUN set -x \
    && adduser -h /home/laravel -s /bin/sh -D laravel
COPY docker/boot.sh /usr/local/bin/boot.sh
RUN set -xe \
    && chmod +x /usr/local/bin/boot.sh

USER laravel
RUN ln -s /var/www/html /home/laravel/html

USER root
ENTRYPOINT [ "/sbin/tini", "--" ]
CMD [ "/usr/local/bin/boot.sh" ]
