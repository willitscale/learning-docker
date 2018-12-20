# Docker Tutorial 07

Advanced Networking with PHP & MySQL

### Create our database Dockerfile in ./db

```
FROM mysql:8.0
```

### Create our web Dockerfile in ./www

```
FROM php:7.2-apache

RUN docker-php-ext-install mysqli 
RUN docker-php-ext-enable mysqli

RUN docker-php-ext-install xdebug 
RUN docker-php-ext-enable xdebug
```

### Setup our network in the docker compose file

```
version: "3"

networks:
  tut07-frontend:
    driver: bridge
    ipam:
      driver: default
      config:
        - subnet: 172.10.1.0/24
  tut07-backend:
    driver: bridge
    ipam: 
      driver: default
      config:
        - subnet: 172.10.2.0/23
```

### Create a database environment file

```
MYSQL_USER=sys_admin
MYSQL_PASSWORD=sys_password
MYSQL_ROOT_PASSWORD=root_password
```

### Add the database container

```
services:
  tut07-db:
    build: ./db
    command: --default-authentication-plugin=mysql_native_password
    ports:
      - 3306:3306
    networks:
      tut07-backend:
        ipv4_address: 172.10.3.2
    env_file:
      - ./development.env
```

### Add the web container

```
  tut07-www:
    build: ./www
    ports:
      - 8080:80
    volumes:
      - ./src:/var/www/html/
    networks:
      tut07-backend:
        ipv4_address: 172.10.2.2
      tut07-frontend:
        ipv4_address: 172.10.1.2
    depends_on:
      - tut07-db
    env_file:
      - ./development.env
```

### PHP Script to test the networking

```
<?php

$mysqli = new mysqli('tut07-db', getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), 'information_schema');

if ($mysqli->connect_error) {
    echo 'Connection Error [', $mysqli->connect_errno, ']: ', $mysqli->connect_error;
} else {
    echo 'MySQLi Connected Successfully!';
}
```

### Start the containers, networks and volumes

```
docker-compose up
```

### To destroy the setup

```
docker-compose down
```

### Resources

* [Docker - Network](https://docs.docker.com/network/)
* [Docker - Environment Variables](https://docs.docker.com/compose/environment-variables/)