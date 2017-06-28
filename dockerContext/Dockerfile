FROM php:5.6-cli
RUN apt-get update && \
    apt-get install -y python-dev libxml2-dev libxslt1-dev zlib1g-dev libpng-dev libc-client-dev libkrb5-dev libmcrypt-dev libreadline-dev && \
    rm -r /var/lib/apt/lists/*
RUN docker-php-ext-install bcmath && \
    docker-php-ext-install calendar && \
    docker-php-ext-install gd && \
    docker-php-ext-configure imap --with-kerberos --with-imap-ssl && \
    docker-php-ext-install imap && \
    docker-php-ext-install mcrypt && \
    docker-php-ext-install hash && \
    docker-php-ext-install mysql && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install pcntl && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install sockets && \
    docker-php-ext-install wddx && \
    docker-php-ext-install xsl && \
    docker-php-ext-install zip
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer
RUN composer global require kherge/box --prefer-dist
RUN pecl install xdebug
RUN echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20131226/xdebug.so" > /usr/local/etc/php/conf.d/pecl-xdebug.ini
RUN ln -sf /root/.composer/vendor/bin/box /usr/local/bin/box
RUN echo "xdebug.remote_host="`/sbin/ip route | /usr/bin/awk '/default/ { print $3 }'` >> /usr/local/etc/php/conf.d/pecl-xdebug.ini
RUN echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/pecl-xdebug.ini && \
    echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/pecl-xdebug.ini && \
    echo "xdebug.remote_connect_back=off" >> /usr/local/etc/php/conf.d/pecl-xdebug.ini && \
    echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/pecl-xdebug.ini && \
    echo "xdebug.profiler_enable=0" >> /usr/local/etc/php/conf.d/pecl-xdebug.ini && \
    echo 'xdebug.profiler_output_dir="/opt/project"' >> /usr/local/etc/php/conf.d/pecl-xdebug.ini && \
    echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/pecl-xdebug.ini
RUN echo "phar.readonly = off" > /usr/local/etc/php/conf.d/phar.ini
WORKDIR /tmp/composerCache
COPY composer.json ./
COPY composer.lock ./
RUN composer install --no-scripts --no-autoloader --prefer-dist
WORKDIR /opt/project

CMD "/usr/local/bin/php"