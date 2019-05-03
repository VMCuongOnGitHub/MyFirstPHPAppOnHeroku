<?php require 'header-admin.php'; ?>
<?php
if (isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];

  $query = "DELETE FROM Users WHERE user_id = {$user_id}";
  $delete_user_query = mysqli_query($connection, $query);

  header('Location: edit-delete-user.php');
  exit();
}
?>
<?php require 'footer-admin.php'; ?>
