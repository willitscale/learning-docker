# Docker Tutorial 06

Basic Docker bridge network

### Create your network

```
docker network create mynetwork
```

### Verify your network

```
docker network ls
```

### Create a container within your network

```
docker run -d -p 8080:80 --network mynetwork --name myhost nginx
```

### Create a container using the default network

```
docker run -it tutum/curl bash
```

### Create another container within your network

```
docker run -it --network mynetwork tutum/curl bash
```

### Disconnect your container from your network

```
docker network disconnect mynetwork myhost
```

### Connect your container back to your network

```
docker network disconnect mynetwork myhost
```

### Resources

* [Docker Compose](https://docs.docker.com/compose/)
* [Docker Reference - Network Create](https://docs.docker.com/engine/reference/commandline/network_create/)
* [Docker Reference - Network Connect](https://docs.docker.com/engine/reference/commandline/network_connect//)
* [Docker Reference - Network Disconnect](https://docs.docker.com/engine/reference/commandline/network_disconnect/)