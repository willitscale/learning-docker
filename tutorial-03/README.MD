# Docker Tutorial 03

With a working container we need to attach a volume to it

### Create our Dockerfile

```
FROM php:7.2-cli
COPY ./src /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "./run.php" ]
```

### Create our Docker image from our Dockerfile

`docker build -t run-php .`

### Check that our image has been created

`docker images`

### Run our docker image which should have copied a local file

`docker run -it --rm --name run-app run-php`

```
-t              : Allocate a pseudo-tty
-i              : Keep STDIN open even if not attached
```

### Remove the image

`docker rmi run-php`

### Instead of building

`docker run -it --rm --name php-runner -v C:\Users\miner10\Documents\GitHub\learning-docker\tutorial-03\src:/usr/src/myapp -w /usr/src/myapp php:7.2-cli php run.php`

```
--rm=false: Automatically remove the container when it exits
-v, --volume=[host-src:]container-dest[:<options>]: Bind mount a volume.
The comma-delimited `options` are [rw|ro], [z|Z],
[[r]shared|[r]slave|[r]private], and [nocopy].
The 'host-src' is an absolute path or a name value.

If neither 'rw' or 'ro' is specified then the volume is mounted in
read-write mode.

The `nocopy` mode is used to disable automatically copying the requested volume
path in the container to the volume storage location.
For named volumes, `copy` is the default mode. Copy modes are not supported
for bind-mounted volumes.
-w="": Working directory inside the container
```

### Resources

* [Docker Reference - run](https://docs.docker.com/engine/reference/run/#additional-groups)
* [Docker Reference - build](https://docs.docker.com/engine/reference/commandline/build/)
* [Docker Reference - volumes](https://docs.docker.com/storage/volumes/)