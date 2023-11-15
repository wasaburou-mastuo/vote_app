FROM php:8.0-apache

RUN apt-get update && apt-get install -y libonig-dev && \
docker-php-ext-install pdo_mysql mysqli mbstring && \
# vim install
apt-get update && apt-get -y install vim 
RUN mkdir /root/.vim
COPY .vimrc /root/.vimrc

# xdebug install(php7環境を構築するときはXdebugは3.1.6以前を指定)
RUN pecl install xdebug && \
docker-php-ext-enable xdebug
RUN  a2enmod rewrite


#COPY ./test.conf /etc/apache2/mods-enabled/
#COPY ./html/vote_app /var/www/html
COPY php.ini /usr/local/etc/php/php.ini
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini