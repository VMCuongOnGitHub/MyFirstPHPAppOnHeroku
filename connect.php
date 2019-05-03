<?php

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
