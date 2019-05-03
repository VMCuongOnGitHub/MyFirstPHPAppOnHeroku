<?php require 'header-admin.php'; ?>


<?php
  if (isset($_POST['update'])) {
    $category_id = $_GET['category_id'];

      $query = "UPDATE Category SET
      category_name = '{$_POST['category_name_post']}',
      short_description = '{$_POST['short_description_post']}',
      category_image = '{$_FILES['file']['name']}'
      WHERE category_id = '{$category_id}'
      ";

      // Make a connection to database and execute the querry
      $select_category_query = mysqli_query($connection, $query);
      $row = mysqli_fetch_assoc($select_category_query);

      $category_image = $_FILES['file']['name'];

      $image_file = $_FILES['file']['name'];
      $image_temp_location = $_FILES['file']['tmp_name'];

      print_r($image_file);
      print_r($image_temp_location);

      $allowed =  array('gif','png' ,'jpg', 'jpeg');
      $ext = pathinfo($image_file, PATHINFO_EXTENSION);
      print_r($ext);
      if(!in_array($ext,$allowed) ) {
        echo "
        <script>
          alert('Invalid Extension -> invalid');
        </script>
        ";
      }else{
        move_uploaded_file($image_temp_location  , UPLOAD_DIRECTORY . DS . $category_image);

        header('Location: view-category.php');
        exit();
      }
  }
?>

<form action='' method='POST' enctype='multipart/form-data'>
  <div class='col-md-8'>
    <?php
      if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];

        // SELECT the elements that you want to display from database
        $query = "SELECT * FROM Category WHERE category_id = '{$category_id}'";
        // Make a connection to database and execute the querry
        $select_category_query = mysqli_query($connection, $query);
        // Use while loop to show the value
        $row = mysqli_fetch_assoc($select_category_query);

        $category_name = $row['category_name'];
        $category_image = $row['category_image'];
        $category_shortDescription = $row['short_description'];

        echo "
                <div class='form-group'>
                  <label for='category-title'>Category Name </label>
                  <input type='text' name='category_name_post' class='form-control' value='{$category_name}' required>
                </div>
                <div class='form-group'>
                  <label for='product-title'>Category Description</label>
                  <textarea name='short_description_post' id='' cols='30' rows='10' class='form-control' required>{$category_shortDescription}</textarea>
                </div>
                <div class='form-group'>
                    <label for='product-title'>Product Image</label>
                    <input type='file' name='file'>
                    <img width='100' src='images/{$category_image}' alt='{$category_name}'>
                </div>
                <div class='form-group'>
                  <input type='submit' name='update' class='btn btn-primary btn-lg' value='Update'>
                </div>
        ";
      }
    ?>
  </div>
</form>


<?php require 'footer-admin.php'; ?>
