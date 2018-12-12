# Docker Tutorial 02

This tutorial we're going to look at building our own images from a Dockerfile

### Create our Dockerfile

```
FROM nginx
COPY html /usr/share/nginx/html
```

### Create our Docker image from our Dockerfile

`docker build --tag my_http .`

### Check that our image has been created

`docker images`

### Run our docker image on port 8080

`docker run -d -p 8080:80 --name my_http`

### Stop the container

`docker stop CONTAINER_ID`

### Find the image ID

`docker images`

### Remove the image

`docker rmi my_http`

### If removal fails force the removal

`docker rmi my_http --force`

### Resources

* [Docker Reference - builder](https://docs.docker.com/engine/reference/builder/)
* [Docker Reference - build](https://docs.docker.com/engine/reference/commandline/build/)
* [Docker Reference - images](https://docs.docker.com/engine/reference/commandline/images/)
* [Docker Reference - rmi](https://docs.docker.com/engine/reference/commandline/rmi/)
