<?php require 'header-admin.php'; ?>

<?php
if (isset($_POST['publish'])) {
  $product_name = sanitizeString($_POST['product_name']);

  $validate_query = "SELECT * FROM Product WHERE product_name = '{$_POST['product_name']}'";
  $select_identical_query = mysqli_query($connection, $validate_query);
  $row = mysqli_fetch_assoc($select_identical_query);
  $identical_name = $row['product_name'];

  if (isset($identical_name)) {
    echo "
    <script>
      alert('Identical name -> invalid');
    </script>
    ";
  }else{
    $price = sanitizeString($_POST['price']);
    $long_description = sanitizeString($_POST['long_description']);
    $short_description = sanitizeString($_POST['short_description']);

    $product_image = $_FILES['file']['name'];
    $image_temp_location = sanitizeString($_FILES['file']['tmp_name']);


    $allowed =  array('gif','png' ,'jpg', 'jpeg');
    $ext = pathinfo($product_image, PATHINFO_EXTENSION);
    if(!in_array($ext,$allowed) ) {
      echo "
      <script>
        alert('Invalid Extension -> invalid');
      </script>
      ";
    }else{
      move_uploaded_file($image_temp_location  , UPLOAD_DIRECTORY . DS . $product_image);

      $categoryID_query = "SELECT category_id FROM Category WHERE category_name = '{$_POST['product_category_name']}'";
      $select_categoryID_query = mysqli_query($connection, $categoryID_query);
      $row = mysqli_fetch_assoc($select_categoryID_query);
      $category_id = $row['category_id'];

      $query="INSERT INTO
      Product(product_name, price, short_description, long_description, product_image, category_id, added_date)
      VALUES
      ('{$product_name}','{$price}','{$short_description}','{$long_description}','{$product_image}','{$category_id}',NOW())
      ";
      // Make a connection to database and execute the querry
      $create_product_query = mysqli_query($connection, $query);
      if (!$create_product_query) {
        die('Query is not right' . mysqli_error($connection));
      }
      header('Location: index.php');
      exit();
    }
  }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="col-md-8">
      <div class='form-group'>
      <label for='product-title'>Product Name </label>
          <input type='text' name='product_name' class='form-control' value='' required>

      </div>
      <div class='form-group'>
             <label for='product-title'>Product Description</label>
        <textarea name='long_description' id='' cols='30' rows='10' class='form-control' required></textarea>
      </div>
      <div class='form-group row'>
        <div class='col-xs-3'>
          <label for='product-price'>Product Price</label>
          <input type='number' name='price' class='form-control' size='60' value='{$product_price}' required>
        </div>
      </div>
      <div class='form-group'>
        <label for='product-title'>Product Short Description</label>
        <textarea name='short_description' id='' cols='30' rows='3' class='form-control' required></textarea>
      </div>

      </div>

      <aside id='admin_sidebar' class='col-md-4'>
          <div class='form-group'>
          <input type='submit' name='publish' class='btn btn-primary btn-lg' value='Publish'>
          </div>

          <div class='form-group'>
            <label for='product-title'>Product Category</label>
            <select name='product_category_name' id='' class='form-control'>
              <?php
              $category_query = "SELECT * FROM Category";
              // Make a connection to database and execute the querry
              $select_category_query = mysqli_query($connection, $category_query);
              // Use while loop to show the value
              while ($row = mysqli_fetch_assoc($select_category_query)) {
                $category_name = $row['category_name'];
                echo "
                  <option value='{$category_name}'>{$category_name}</option>
                ";
              }
              ?>
            </select>
          </div>

       <div class="form-group">
           <label for="product-title">Product Image</label>
           <input type="file" name="file">
       </div>
      </aside>
      </form>
<?php require 'footer-admin.php' ?>
