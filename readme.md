# Running PHP Projects:

## Starting the container
```shell
docker compose up -d
```

Visit http://localhost:8080/
Or any other subdomain configured, example:
http://example.localhost:8080/


## Shutdown the container
```shell
docker compose down
```

## Shutdown the container removing orphans
```shell
docker compose down --remove-orphans
```

## Re build container
```shell
docker compose up -d --build
```

## Running commands inside docker service
```shell
docker compose run php-fpm composer install --working-dir=/var/www/app1
```

## Get my docker host ip address
```shell
ip -4 addr show docker0 | awk '$1=="inet" {print $2}' | cut -d/ -f1
```