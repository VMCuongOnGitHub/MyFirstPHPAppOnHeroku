<?php require 'header-admin.php'; ?>


<?php
  if (isset($_POST['update'])) {
    $product_id = $_GET['product_id'];

    $query = "UPDATE Product SET
    product_name = '{$_POST['product_name']}',
    price = '{$_POST['price']}',
    long_description = '{$_POST['long_description']}',
    short_description = '{$_POST['short_description']}',
    product_image = '{$_FILES['file']['name']}'
    WHERE product_id = '{$product_id}'
    ";

    // Make a connection to database and execute the querry
    $select_product_query = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($select_product_query);

    $product_image = $_FILES['file']['name'];
    $image_temp_location = $_FILES['file']['tmp_name'];

    $allowed =  array('gif','png' ,'jpg', 'jpeg');
    $ext = pathinfo($product_image, PATHINFO_EXTENSION);
    print_r($ext);
    if(!in_array($ext,$allowed) ) {
      echo "
      <script>
        alert('Invalid Extension -> invalid');
      </script>
      ";
    }else{
      move_uploaded_file($image_temp_location  , UPLOAD_DIRECTORY . DS . $product_image);
      header('Location: index.php');
      exit();
    }
  }
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
    <?php
      if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
      }
      // SELECT the elements that you want to display from database
      $query = "SELECT * FROM Product WHERE product_id = '{$product_id}'";
      // Make a connection to database and execute the querry
      $select_product_query = mysqli_query($connection, $query);
      // Use while loop to show the value
      $row = mysqli_fetch_assoc($select_product_query);

      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $product_image = $row['product_image'];
      $product_price = $row['price'];
      $product_rating = $row['rating'];
      $product_longDescription = $row['long_description'];
      $product_shortDescription = $row['short_description'];

      echo "
        <div class='form-group'>
        <label for='product-title'>Product Name </label>
            <input type='text' name='product_name' class='form-control' value='{$product_name}' required>

        </div>
        <div class='form-group'>
               <label for='product-title'>Product Description</label>
          <textarea name='long_description' id='' cols='30' rows='10' class='form-control' required>{$product_longDescription}</textarea>
        </div>
        <div class='form-group row'>
          <div class='col-xs-3'>
            <label for='product-price'>Product Price</label>
            <input type='number' name='price' class='form-control' size='60' value='{$product_price}' required>
          </div>
        </div>
        <div class='form-group'>
               <label for='product-title'>Product Short Description</label>
          <textarea name='short_description' id='' cols='30' rows='3' class='form-control' required>{$product_shortDescription}</textarea>
        </div>

        </div>

        <aside id='admin_sidebar' class='col-md-4'>
            <div class='form-group'>
            <input type='submit' name='update' class='btn btn-primary btn-lg' value='Update'>
            </div>

            <div class='form-group'>
              <label for='product-title'>Product Category</label>
              <select name='product_category_id' id='' class='form-control'>
      ";

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


      echo "
              </select>
            </div>
            <div class='form-group'>
              <label for='product-title'>Product Image</label>
              <input type='file' name='file'>
              <img width='200' src='images/{$product_image}' alt=''>
            </div>
        </aside>
        </form>
      ";
    ?>



<?php require 'footer-admin.php'; ?>
