<?php

$autoloadFile = __DIR__.'/vendor/autoload.php';

if(!file_exists($autoloadFile)){
    echo '<h1>You need to install composer dependencies before loading this route</h1>';
    echo '<strong>Run the command:</strong> docker compose run php-fpm composer install --working-dir=/var/www/app2';
    exit();
}

require $autoloadFile;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker: Linux + Nginx + PHP + Composer</title>
</head>
<body>
    <h1>Hello world</h1>
    <img src="image.jpg">
    <h2>Database Examples</h2>
    <ul>
        <li><a href="maria.php">View MariaDB connection example</a></li>
        <li><a href="sqlite.php">View SQlite connection example</a></li>
    </ul>
    <h2>Read Environment Variables ($_ENV) using Symfony VarDumper Component</h2>
    <?php dump($_ENV) ?>
</body>
</html>