<?php

try {
    $PDO = new PDO("sqlite:database.db");
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $PDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (Exception $e) {
    var_dump($e->getMessage());
    exit();
}

$PDO->exec("create table if not exists test (
    id integer PRIMARY KEY AUTOINCREMENT,
    name varchar(100) not null,
    value text not null
)");

$query = 'SELECT id, name, value FROM test where name = \'hello\'';
$statement = $PDO->prepare($query);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_OBJ);
if(empty($row)){
    $PDO->exec("insert into test(name, value) values
        ('hello', 'world!'),
        ('lorem', 'ipsum')
    ");
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_OBJ);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker: Linux + Nginx + SQLite + PHP</title>
</head>
<body>
    <h1><?php echo "{$row->name} {$row->value} from SQLite" ?></h1>
    <a href="index.php">Go index</a>
</body>
</html>