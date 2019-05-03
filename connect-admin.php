<?php

$db = parse_url(getenv("DATABASE_URL"));
$pdo = new PDO("pgsql:" . sprintf(
    "db_host=%s;db_port=%s;db_user=%s;db_password=%s;db_database_name=%s",
    $db['db_host'],
    $db['db_user'],
    $db['db_password'],
    $db['db_port'],
    ltrim($db["path"], "/")
));

?>
