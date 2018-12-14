# Docker Tutorial 04

Creating docker compose configurations

### Create our Dockerfile

```
FROM php:7.2-apache
```

### Create our docker compose file

```
version: "3"
services:
    www:
        build: .
        ports:
            - "8080:80"
        volumes:
            - ./src:/var/www/html/
        networks:
            - default
```

### Start our docker container

```
docker-compose up
```

### Stop and remove our docker container

```
docker-compose down
```

### Resources

* [Docker Compose](https://docs.docker.com/compose/)
* [Docker Compose Reference - up](https://docs.docker.com/compose/reference/up/)
* [Docker Compose Reference - down](https://docs.docker.com/compose/reference/down/)