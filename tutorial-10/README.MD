# Docker Tutorial 10

Load balanced stack using docker swarm, but before we start create the swarm with the boot2docker images

### For Hyperv setup run

```
docker-machine create -d hyperv --hyperv-virtual-switch "dockerswarm" --hyperv-boot2docker-url https://github.com/boot2docker/boot2docker/releases/download/v18.06.1-ce/boot2docker.iso nodemanager
docker-machine create -d hyperv --hyperv-virtual-switch "dockerswarm"  --hyperv-boot2docker-url https://github.com/boot2docker/boot2docker/releases/download/v18.06.1-ce/boot2docker.iso nodeworker 
```

### For Virtual box setup run

```
docker-machine create --driver virtualbox --virtualbox-boot2docker-url https://github.com/boot2docker/boot2docker/releases/download/v18.06.1-ce/boot2docker.iso nodemanager
docker-machine create --driver virtualbox --virtualbox-boot2docker-url https://github.com/boot2docker/boot2docker/releases/download/v18.06.1-ce/boot2docker.iso nodeworker
```

### Make the node manager the swarm manager

```
docker-machine ssh nodemanager "docker swarm init --advertise-addr $(docker-machine ip nodemanager)"
```

### Add the cluster node to the swarm

```
docker-machine ssh nodeworker "docker swarm join --token {TOKEN} $(docker-machine ip nodemanager):2377"
```

### Set the node manager environment to your docker machine

```
# Windows
docker-machine env nodemanager | Invoke-Expression
# Nix
eval $(docker-machine env nodemanager)
```

### Create the networks:

```
docker network create --driver overlay --subnet=172.10.1.0/24 tut10-frontend

docker network create --driver overlay --subnet=172.10.2.0/23 tut10-backend
```

### Deploy the stack

```
docker stack deploy -c php-mysqli-apache.yml php-mysqli-apache
```

### Veify the stack has been deployed

```
docker stack ls
```

### Verify all the containers have been deployed

```
docker stack ps php-mysqli-apache
```

### Verify the load balancers have all the replicas and mapped the ports

```
docker stack services php-mysqli-apache
```

### See what containers are on the nodemanager in the swarm

```
docker ps
# or
docker-machine ssh nodemanager "docker ps"
```

### See what containers are on the nodeworker in the swarm

```
docker-machine ssh nodeworker "docker ps"
```

### Verify that the stack is working correctly

```
# local node master
curl http://localhost:8080
# vm node master
curl http://$(docker-machine ip nodemanager):8080
```

### Destory and remove the stack
```
docker stack rm php-mysqli-apache
```