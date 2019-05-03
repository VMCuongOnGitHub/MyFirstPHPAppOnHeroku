<?php require 'header-admin.php'; ?>
<?php
if (isset($_GET['slide_id'])) {
  $slide_id = $_GET['slide_id'];

  $query = "DELETE FROM Slider WHERE slider_id = {$slide_id}";
  $delete_slide_query = mysqli_query($connection, $query);

  header('Location: edit-delete-slide.php');
  exit();
}
?>
<?php require 'footer-admin.php'; ?>
