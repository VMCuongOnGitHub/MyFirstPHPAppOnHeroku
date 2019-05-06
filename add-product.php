<?php require 'header-admin.php'; ?>

<?php
  if (isset($_POST['publish'])) {
    $product_name = $_POST['product_name'];
    $short_description = $_POST['short_description'];
    $price = $_POST['price'];
    $product_image = $_POST['product_image'];

    $sql = "INSERT INTO product VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute([$product_name, $price, $short_description, $product_image]);
    $resultSet = $stmt->fetchAll();
  }
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
      <div class='form-group'>
      <label for='user-title'>Product name</label>
        <input type='text' name='product-name' class='form-control' value=''>
      </div>
      <div>
      <label for='user-title'>Description</label>
        <input type='text' name='description' class='form-control' value=''>
      </div>
      <div>
      <label for='user-title'>Price</label>
        <input type='text' name='price' class='form-control' value=''>
      </div>
      <div>
      <label for='user-title'>Product Image</label>
        <input type='text' name='product_image' class='form-control' value=''>
      </div>
      <br>
      <hr>
      <br>
      <input type='submit' name='publish' class='btn btn-primary btn-lg' value='Publish'>
  </div>
</form>
<?php require 'footer-admin.php' ?>
