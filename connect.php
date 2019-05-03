<?php
  $db = parse_url(getenv("DATABASE_URL"));
  $pdo = new PDO("pgsql:" . sprintf(
      "db_host=%s;port=%s;db_user=%s;db_password=%s;db_database_name=%s",
      $db['db_host'],
      $db['db_user'],
      $db['db_password'],
      $db['db_database_name'],
      ltrim($db["path"], "/")
  ));
  // Array of infor about host, user, password, database name. Just for easy to manage.
  $db['db_host'] = 'localhost';
  $db['db_user'] = 'root';
  $db['db_password'] = '';
  $db['db_database_name'] = 'assignment-2-web';

  // Convert all valuable in to UPPERCASE
  foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
  }

  $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE_NAME);

?>
