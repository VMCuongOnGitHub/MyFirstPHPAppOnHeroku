<?php require 'header-admin.php'; ?>

<?php
if (isset($_POST['publish'])) {

  $category_name = sanitizeString($_POST['category_name']);

  $validate_query = "SELECT * FROM Category WHERE category_name = '{$_POST['category_name']}'";
  $select_identical_query = mysqli_query($connection, $validate_query);
  $row = mysqli_fetch_assoc($select_identical_query);
  $identical_name = $row['category_name'];

  if (isset($identical_name)) {
    echo "
    <script>
      alert('Identical name -> invalid');
    </script>
    ";
  }else{
    $category_image = sanitizeString($_FILES['file']['name']);
    $short_description = sanitizeString($_POST['short_description']);

    $image_file = $_FILES['file']['name'];
    $image_temp_location = $_FILES['file']['tmp_name'];


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
          $query="INSERT INTO
          Category(category_name, category_image, short_description)
          VALUES
          ('{$category_name}','{$category_image}','{$short_description}')
          ";
          // Make a connection to database and execute the querry
          $update_category_query = mysqli_query($connection, $query);
          if (!$update_category_query) {
            die('Query is not right' . mysqli_error($connection));
          }
          header('Location: edit-delete-category.php');
          exit();
    }
  }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
      <div class='form-group'>
      <label for='category-title'>Category Name </label>
        <input type='text' name='category_name' class='form-control' value='' required>
      </div>
      <div class='form-group'>
        <label for='product-title'>Category Description</label>
        <textarea name='short_description' id='' cols='30' rows='10' class='form-control'></textarea>
      </div>
      <div class="form-group">
          <label for="product-title">Product Image</label>
          <input type="file" name="file">
      </div>
      <div class='form-group'>
      <input type='submit' name='publish' class='btn btn-primary btn-lg' value='Publish'>
      </div>
  </div>
</form>
<?php require 'footer-admin.php' ?>
