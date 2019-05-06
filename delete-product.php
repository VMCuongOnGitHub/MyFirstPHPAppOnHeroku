<?php require 'header-admin.php'; ?>
<?php
if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];

  $sql = "DELETE FROM product WHERE product_id = {$product_id}";
  $stmt = $pdo->prepare($sql);
  //Thiết lập kiểu dữ liệu trả về
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $stmt->execute();
  $resultSet = $stmt->fetchAll();

  header('Location: view-product.php');
  exit();
}
?>
<?php require 'footer-admin.php'; ?>
