# Docker Tutorial 12

Mongo cluster, deploying a ReplicaSet

### To run the cluster:
```
docker-compose up
```

### Connect to the primary node
```
docker-compose exec tut12-mongo-primary mongo -u "root" -p "password"
```

### Instantiate the replica set
```
rs.initiate({"_id" : "tut12-replica-set","members" : [{"_id" : 0,"host" : "tut12-mongo-primary:27017"},{"_id" : 1,"host" : "tut12-mongo-worker-1:27017"},{"_id" : 2,"host" : "tut12-mongo-worker-2:27017"},{"_id" : 3,"host" : "tut12-mongo-worker-3:27017"}]});
```

### Set the priority of the master over the other nodes
```
conf = rs.config();
conf.members[0].priority = 2;
rs.reconfig(conf);
```

### Create a cluster admin
```
use admin;
db.createUser({user: "cluster_admin",pwd: "password",roles: [ { role: "userAdminAnyDatabase", db: "admin" },  { "role" : "clusterAdmin", "db" : "admin" } ]});
db.auth("cluster_admin", "password");
```

### Create a collection on a database
```
use my_data;
db.createUser({user: "my_user",pwd: "password",roles: [ { role: "readWrite", db: "my_data" } ]});
db.createCollection('my_collection');
```

### Verify credentials
```
docker-compose exec tut12-mongo-primary mongo -u "my_user" -p "password" --authenticationDatabase "my_data"
```

### Destory the cluster
```
docker-compose down
```
