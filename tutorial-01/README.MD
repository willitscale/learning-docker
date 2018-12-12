# Docker Tutorial 01

In this tutorial we'll look at the basics of creating containers

### Verify the docker install with

`docker run hello-world`

### Running an ubuntu container in foreground mode

`docker run -it ubuntu bash`

```
-t              : Allocate a pseudo-tty
-i              : Keep STDIN open even if not attached
```

### Running an nginx container in background mode and mapping a port

`docker run -d -p 8080:80 nginx`

```
-d=false: Detached mode: Run container in the background, print new container id
-p=[]      : Publish a container's port or a range of ports to the host
               format: ip:hostPort:containerPort | ip::containerPort | hostPort:containerPort | containerPort
               Both hostPort and containerPort can be specified as a
               range of ports. When specifying ranges for both, the
               number of container ports in the range must match the
               number of host ports in the range, for example:
                   -p 1234-1236:1234-1236/tcp

               When specifying a range for hostPort only, the
               containerPort must not be a range.  In this case the
               container port is published somewhere within the
               specified hostPort range. (e.g., `-p 1234-1236:1234/tcp`)

               (use 'docker port' to see the actual mapping)
```

### Show the running containers

`docker ps`

### Stopping a running container

`docker stop CONTAINER_ID`

### Resources

* [Docker Reference - run](https://docs.docker.com/engine/reference/run/)
* [Docker Reference - ps](https://docs.docker.com/engine/reference/commandline/ps/)
* [Docker Reference - stop](https://docs.docker.com/engine/reference/commandline/stop/)