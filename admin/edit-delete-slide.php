<?php require 'header-admin.php'; ?>
<div class="container-fluid">
  <div class="row">
    <?php
    // SELECT the elements that you want to display from database
    $query = "
      SELECT *
      FROM Slider
    ";
    // Make a connection to database and execute the querry
    $select_all_slide_query = mysqli_query($connection, $query);
    // Use while loop to show the value
    while ($row = mysqli_fetch_assoc($select_all_slide_query)) {
      $slide_id = $row['slider_id'];
      $slide_image = $row['slider_image'];
      $image_name = $row['image_name'];

      echo "
      <div class='col-md-3'>
        <h4>{$image_name}</h4>
        <img class='img-thumbnail' src='images/{$slide_image}' alt='{$image_name}'>
        <a onClick='confirmation()' class='btn btn-danger validate'><span class='glyphicon glyphicon-remove'></span></a>

      </div>
      ";
    }
    ?>
  </div>
</div>
<script type="text/javascript">
  function confirmation() {
    var confirmmessage = "Are you sure to delete this user?";
    var message = "Action Was Cancelled";
    if (confirm(confirmmessage)) {
      $(".validate").attr("href", "delete-slide.php?slide_id=<?php echo "{$slide_id}"; ?>");
    } else {
         alert(message);
    }
  }
</script>
<?php require 'footer-admin.php' ?>
