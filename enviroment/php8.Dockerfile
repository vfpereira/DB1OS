FROM php:8

RUN apt update
RUN apt install -y libxml2-dev 
RUN docker-php-ext-install dom
RUN docker-php-ext-install mbstring