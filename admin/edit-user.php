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
      // SELECT the elements that you want to display from database
      $query = "SELECT * FROM Users WHERE user_id = '{$user_id}'";
      // Make a connection to database and execute the querry
      $select_user_query = mysqli_query($connection, $query);
      // Use while loop to show the value
      $row = mysqli_fetch_assoc($select_user_query);

      $user_id = $row['user_id'];
      $username = $row['username'];
      $password = $row['password'];

      echo "
        <div class='form-group'>
          <label for='user-title'>Username</label>
          <input type='text' name='username' class='form-control' value='{$username}' required>
        </div>
        <div class='form-group'>
          <label for='user-title'>Password</label>
          <input type='text' name='password' class='form-control' value='{$password}' required>
        </div>
        <div class='form-group'>
          <input type='submit' name='update' class='btn btn-primary btn-lg' value='Update'>
        </div>
      ";
    ?>
  </div>
</form>
<?php require 'footer-admin.php'; ?>
