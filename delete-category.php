<?php require 'header-admin.php'; ?>

<?php
if (isset($_GET['category_id'])) {
  $category_id = $_GET['category_id'];

  $query_product_category = "
    DELETE FROM Product WHERE Product.category_id = {$category_id}
  ";
  $delete_product_query = mysqli_query($connection, $query_product_category);

  $query_delete_category = "
    DELETE FROM Category WHERE category_id = {$category_id};
  ";
  $delete_category_query = mysqli_query($connection, $query_delete_category);

  header('Location: edit-delete-category.php');
  exit();
}
?>
<?php require 'footer-admin.php' ?>
