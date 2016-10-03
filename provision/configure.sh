#!/usr/bin/env bash

cd /var/www/app
composer install

if [ ! -d public/assets/dist ]; then
    ln -s ../../vendor/twbs/bootstrap/dist/ public/assets/dist
fi

if [ ! -d public/assets/jquery ]; then
    ln -s ../../vendor/components/jquery/ public/assets/jquery
fi

mysql -uroot -proot < provision/dump.sql