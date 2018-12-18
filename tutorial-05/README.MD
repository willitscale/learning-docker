# Docker Tutorial 05

Customising Docker Images with Builder

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

### Let's add xdebug to our installation

```
RUN pecl install xdebug-2.6.0
```

### Enable the module

```
RUN docker-php-ext-enable xdebug
```

### Let's also add redis

```
RUN pecl install redis-4.0.1
```

### Also, enable the redis module

```
RUN docker-php-ext-enable redis
```

### Finally, let's set an environment variable for Redis

```
ENV REDIS_HOST redis
```

### Resources

* [Docker Builder](https://docs.docker.com/engine/reference/builder/)