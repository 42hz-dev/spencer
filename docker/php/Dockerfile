FROM php:8.3-fpm-alpine

# 로컬 개발용: 설정 실수를 바로 볼 수 있도록 development ini 사용
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

WORKDIR /var/www/spencer
