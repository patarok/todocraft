FROM registry.pc-web.at/entwicklung/docker/base-images/php:7.4-fpm-debug

ENV COMPOSER_HOME=/.composer

# Arguments defined in docker-compose.yml
ARG USER_ID
ARG GROUP_ID

# Create system user to run Composer and Artisan Commands
RUN if [ ${USER_ID:-0} -ne 0 ] && [ ${GROUP_ID:-0} -ne 0 ]; then \
    userdel -f www-data &&\
    if getent group www-data ; then groupdel www-data; fi &&\
    groupadd -g ${GROUP_ID} www-data &&\
    useradd -l -u ${USER_ID} -g www-data www-data &&\
    install -d -m 0755 -o www-data -g www-data /home/www-data &&\
    chown --changes --silent --no-dereference --recursive \
          --from=33:33 ${USER_ID}:${GROUP_ID} \
        /home/www-data \
        /.composer \
;fi

RUN apt-get update && apt-get install -y libonig-dev libmpdec-dev && \
 apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd


RUN apt-get update && apt-get install -y \
    imagemagick libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick


# Set working directory
WORKDIR /var/www

USER www-data
