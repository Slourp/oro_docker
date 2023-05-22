# Use an official PHP runtime as a parent image
FROM php:8.2-fpm as app

# Set build arguments
ARG USER_ID
ARG GROUP_ID
ARG USER
ARG DEBUG_MODE=off

# Useful stuffs for the moment
RUN apt-get update && apt-get install -y nano bash zsh git coreutils

# Install nvm dependencies
RUN apt-get install -y curl  python3 

# 
RUN ln -s $(which php) /usr/local/lib/php

# Change the default shell for all users to zsh
RUN sed -i 's/\/bin\/sh/\/usr\/bin\/zsh/g' /etc/passwd

# Create a group and user
RUN groupadd -g ${GROUP_ID} ${USER} && useradd -u ${USER_ID} -g ${USER} -s /usr/bin/zsh -m ${USER}
# Set the working directory to /var/www/app
WORKDIR "/var/www/app"

# Useful PHP extension installer image, copy binary into your container
# Todo Uncomment when dev done
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# Install php extensions
# Todo Uncomment when dev done
RUN set -eux && /usr/local/bin/install-php-extensions pdo pdo_mysql pdo_pgsql mysqlnd xml soap gd zip intl mbstring opcache curl mongodb bcmath ldap pcntl

# ENV COMPOSER_ALLOW_SUPERUSER=1

# obtain composer using multi-stage build
# Todo Uncomment when dev done
COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

# Todo Uncomment when dev done
COPY ./composer.* /var/www/app

# Todo Uncomment when dev done
RUN chown -R ${USER}:${USER} /var/www/app

# copy application files to the working directory
# Todo Uncomment when dev done
COPY ./ /var/www/app
# Todo Uncomment when dev done
RUN rm -rf /var/www/app/docker

# Switch to the created user
USER ${USER}

# Dev image
# This stage is meant to be target-built into a separate image
FROM app as app_dev

# Set the working directory to /var/www/app
WORKDIR "/var/www/app"

# Todo Uncomment when dev done
ENV XDEBUG_MODE=${DEBUG_MODE}

# Copy xdebug config file into container
# Todo Uncomment when dev done
COPY ./docker/php/conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Install xdebug
# Todo Uncomment when dev done
RUN set -eux && install-php-extensions xdebug

USER ${USER}
