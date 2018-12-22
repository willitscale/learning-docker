# Docker Tutorial 08

Getting started with Docker Swarms

### For Hyperv setup run

```
docker-machine create -d hyperv --hyperv-virtual-switch "dockerswarm" nodemanager
docker-machine create -d hyperv --hyperv-virtual-switch "dockerswarm" nodecluster 
```

### For Virtual box setup run

```
docker-machine create --driver virtualbox nodemanager
docker-machine create --driver virtualbox nodecluster
```

### Verify your nodes exist

```
docker-machine ls
```

### Make the node manager the swarm manager

```
docker-machine ssh nodemanager "docker swarm init --advertise-addr {MANAGER_IP}"
```

### Add the cluster node to the swarm

```
docker-machine ssh nodecluster "docker swarm join --token {TOKEN} {MANAGER_IP}:2377"
```

### Verify that the swarm has the correct node configuration

```
docker-machine ssh nodemanager "docker node ls"
```

### View the environment settings of the node manager

```
docker-machine env nodemanager 
```

### Set the node manager environment to your docker machine

```
# Windows
docker-machine env nodemanager | Invoke-Expression
# Nix
eval $(docker-machine env nodemanager)
```

### Verify your currently using the node manager

```
docker-machine ls
```