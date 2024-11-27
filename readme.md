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
docker compose run php-fpm /var/www/example/composer.phar install --working-dir=/var/www/example
```