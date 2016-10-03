#!/usr/bin/env bash

echo Updating apt index files
sudo apt-get -qq update

MYSQL_VERSION=5.6
MYSQL_USERNAME=root
MYSQL_PASSWORD=root

sudo debconf-set-selections <<< "mysql-server-$MYSQL_VERSION mysql-server/root_password password $MYSQL_PASSWORD"
sudo debconf-set-selections <<< "mysql-server-$MYSQL_VERSION mysql-server/root_password_again password $MYSQL_PASSWORD"

sudo apt-get -y install \
    nginx-light \
    mysql-client \
    mysql-server \
    mc \
    vim \
    git \
    curl \
    php5-cli \
    php5-curl \
    php5 \
    php5-fpm \
    php5-mysql \
    php5-dev

sudo sed -i 's/^max_execution_time = 30/max_execution_time = 600/' /etc/php5/fpm/php.ini
sudo sed -i 's/^default_socket_timeout = 60/default_socket_timeout = 600/' /etc/php5/fpm/php.ini
sudo sed -i 's/^display_errors = Off/display_errors = On/' /etc/php5/fpm/php.ini

[ ! -f /etc/php5/fpm/pool.d/www.conf ] || sudo rm /etc/php5/fpm/pool.d/www.conf
sudo cp ${PROVISIONING_ROOT}/fpm-pool.conf /etc/php5/fpm/pool.d/fpm-pool.conf
sudo service php5-fpm restart

sudo cp ${PROVISIONING_ROOT}/nginx.conf /etc/nginx/sites-enabled/nginx.conf
[ ! -f /etc/nginx/sites-enabled/default ] || sudo rm /etc/nginx/sites-enabled/default

if [ ! -d /var/log/app ]; then
    sudo mkdir /var/log/app
    sudo chmod 0777 /var/log/app
fi

sudo service nginx restart

echo Removing unnecessary apt packages
sudo apt-get -yqq autoremove

if [ ! -f /usr/local/bin/composer ]; then
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
fi