<?php require 'header-admin.php'; ?>

<?php
  if (isset($_POST['update'])) {
    $product_id = $_GET['product_id'];

    $product_name = $_POST['product_name'];
    $short_description = $_POST['short_description'];
    $price = $_POST['price'];
    $product_image = $_POST['product_image'];

    $sql = "UPDATE product
            SET product_name = $product_name, short_description = $short_description,price = $price, product_image = $product_image
            WHERE product_id = $product_id";
    $stmt = $pdo->prepare($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet = $stmt->fetchAll();
    
    header('Location: view-product.php');
    exit();
  }
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
    <?php
      if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
      }
      $sql = "SELECT * FROM product";
      $stmt = $pdo->prepare($sql);
      //Thiết lập kiểu dữ liệu trả về
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      $resultSet = $stmt->fetchAll();

      foreach ($resultSet as $row) {

      $product_name = $row['product_name'];
      $short_description = $row['short_description'];
      $price = $row['price'];
      $product_image = $row['product_image'];

      echo "
        <div class='form-group'>
        <label for='user-title'>$product_id</label>
        </div>
        <br>
        <label for='user-title'>Product name</label>
          <input type='text' name='product-name' class='form-control' value='$product_name'>
        </div>
        <div>
        <label for='user-title'>Description</label>
          <input type='text' name='description' class='form-control' value='$short_description'>
        </div>
        <div>
        <label for='user-title'>Price</label>
          <input type='text' name='price' class='form-control' value='$price'>
        </div>
        <div>
        <label for='user-title'>Product Image</label>
          <input type='text' name='product_image' class='form-control' value='$product_image'>
        </div>
        <br>
        <hr>
        <br>
        <input type='submit' name='update' class='btn btn-primary btn-lg' value='Update'>
      ";
    ?>
  </div>
</form>
<?php require 'footer-admin.php'; ?>
