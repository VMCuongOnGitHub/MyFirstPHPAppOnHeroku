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

// Convert all valuable in to UPPERCASE
foreach ($db as $key => $value) {
  define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE_NAME);

?>
