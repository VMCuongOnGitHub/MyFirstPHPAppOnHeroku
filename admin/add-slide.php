<?php require 'header-admin.php'; ?>

<?php
if (isset($_POST['publish'])) {
  $slide_name = sanitizeString($_POST['image_name']);
  $slide_image = sanitizeString($_FILES['file']['name']);

  $image_file = $_FILES['file']['name'];
  $image_temp_location = sanitizeString($_FILES['file']['tmp_name']);


  $allowed =  array('gif','png' ,'jpg', 'jpeg');
  $ext = pathinfo($image_file, PATHINFO_EXTENSION);
  if(!in_array($ext,$allowed) ) {
    echo "
    <script>
      alert('Invalid Extension -> invalid');
    </script>
    ";
  }else{
    move_uploaded_file($image_temp_location  , UPLOAD_DIRECTORY . DS . $slide_image);

    $query="INSERT INTO
    Slider(slider_image, image_name)
    VALUES
    ('{$slide_image}','{$slide_name}')
    ";
    // Make a connection to database and execute the querry
    $update_slider_query = mysqli_query($connection, $query);
    if (!$update_slider_query) {
      die('Query is not right' . mysqli_error($connection));
    }
    header('Location: edit-delete-slide.php');
    exit();
  }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
      <div class='form-group'>
      <label for='slide-title'>Slide Name </label>
        <input type='text' name='image_name' class='form-control' value=''>
      </div>
      <div class="form-group">
          <label for="Slide-title">Slide Image</label>
          <input type="file" name="file">
      </div>
      <div class='form-group'>
      <input type='submit' name='publish' class='btn btn-primary btn-lg' value='Publish'>
      </div>
  </div>
</form>
<?php require 'footer-admin.php' ?>
