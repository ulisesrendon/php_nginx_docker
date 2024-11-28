# Docker LEMP:

Docker multi-project setup for LEMP Stack: Linux + Nginx + MariaDB + PHP

You can have multiple virtual host for Nginx like: app1.localhost, app1.localhost etc.

Before start it you need to find your Docker Host Ip and adding it to the Environment variables, it allows you to connect to Mariadb.

#### Get my docker host ip address
```shell
ip -4 addr show docker0 | awk '$1=="inet" {print $2}' | cut -d/ -f1
```
#### Result
```shell
172.17.0.1
```

## Setting Environment variables
Create a dont env file with the next essencial variables: 
```
DATABASE_HOST: <<Your docker host ip>>
DATABASE_NAME: themariadatabasename
DATABASE_USER: root
DATABASE_PASSWORD: themariadatabsepassword
DATABASE_PORT: 3333
NGINX_PORT: 80
```

## Starting the container
```shell
docker compose up -d
```

Visit http://app1.localhost
Or any other subdomain configured, example:
http://app2.localhost


## Shutdown the container
```shell
docker compose down
```

## Install composer dependencies
In order to use composer and manage dependencies you can run composer using "docker run" command inside php-fpm container but add a working-dir flag to indicate in which project do you want to run it, example:
```shell
docker compose run php-fpm composer install --working-dir=/var/www/app2
```

## Other useful commands for docker:

### Re build container
```shell
docker compose up -d --build
```

### Shutdown the container removing orphans
```shell
docker compose down --remove-orphans
```

