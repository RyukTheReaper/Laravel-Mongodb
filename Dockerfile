
RUN apt update
RUN apt install -y php8.3-xml php8.3-mongo

RUN composer require directorytree/ldaprecord-laravel
