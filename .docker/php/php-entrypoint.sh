#!/bin/bash
set -x
composer install

php-fpm --nodaemonize
