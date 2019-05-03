<?php require 'header-admin.php'; ?>

<?php
if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];

  $query = "DELETE FROM Product WHERE product_id = {$product_id};";
  $delete_product_query = mysqli_query($connection, $query);

  header('Location: index.php');
  exit();
}
?>
<?php require 'footer-admin.php' ?>
