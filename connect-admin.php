<?php

$user = sanitizeString($_POST['username']);
$pass = sanitizeString($_POST['password']);


$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
$db = parse_url(getenv("DATABASE_URL"));
$pdo = new PDO("pgsql:" . sprintf(
    "db_host=%s;db_port=%s;db_user=%s;db_password=%s;db_database_name=%s",
    $db['db_host'],
    $db['db_user'],
    $db['db_password'],
    $db['db_port'],
    ltrim($db["path"], "/")
));

$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();


foreach ($resultSet as $row) {
	echo $row['username'] . '<br>';
}

?>
