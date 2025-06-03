FROM php:8.3-fpm-alpine

# Instala las dependencias del sistema
RUN apk add --no-cache \
    bash \
    curl \
    libpng-dev \
    libzip-dev \
    zlib-dev \
    mysql-client

# Instala extensiones de PHP
RUN docker-php-ext-install gd \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo pdo_mysql

# Obtiene la última versión de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala Node.js y npm
RUN apk add --no-cache nodejs npm

# Configura el directorio de trabajo
WORKDIR /var/www

# Expone el puerto PHP-FPM
EXPOSE 9000


