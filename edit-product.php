<?php require 'header-admin.php'; ?>

<?php
  if (isset($_POST['update'])) {
    $user_id = $_GET['user_id'];

    $token = passwordToToken($_POST['password']);
    $query = "UPDATE Users SET
    username = '{$_POST['username']}',
    password = '{$token}'
    WHERE user_id = '{$user_id}'
    ";

    // Make a connection to database and execute the querry
    $select_user_query = mysqli_query($connection, $query);

    header('Location: edit-delete-user.php');
    exit();
  }
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
    <?php
      if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
      }
      $sql = "SELECT * FROM product";
      $stmt = $pdo->prepare($sql);
      //Thiết lập kiểu dữ liệu trả về
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      $resultSet = $stmt->fetchAll();

      foreach ($resultSet as $row) {

      $product_name = $_POST['product_name'];
      $short_description = $_POST['short_description'];
      $price = $_POST['price'];
      $product_image = $_POST['product_image'];

      echo "
        <div class='form-group'>
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
        <input type='submit' name='publish' class='btn btn-primary btn-lg' value='Update'>
      ";
    ?>
  </div>
</form>
<?php require 'footer-admin.php'; ?>
