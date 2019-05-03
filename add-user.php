<?php require 'header-admin.php'; ?>

<?php
if (isset($_POST['publish'])) {
  $username = sanitizeString($_POST['username']);

  $validate_query = "SELECT * FROM Users WHERE username = '{$_POST['username']}'";
  $select_identical_query = mysqli_query($connection, $validate_query);
  $row = mysqli_fetch_assoc($select_identical_query);
  $identical_name = $row['username'];

  if (isset($identical_name)) {
    echo "
    <script>
      alert('Identical name -> invalid');
    </script>
    ";
  }else{
    $password = sanitizeString($_POST['password']);
    $token = passwordToToken($password);
    $query="INSERT INTO
    Users(username, password)
    VALUES
    ('{$username}','{$token}')
    ";
    // Make a connection to database and execute the querry
    $update_user_query = mysqli_query($connection, $query);
    if (!$update_user_query) {
      die('Query is not right' . mysqli_error($connection));
    }
    header('Location: edit-delete-user.php');
    exit();
  }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
      <div class='form-group'>
      <label for='user-title'>Username</label>
        <input type='text' name='username' class='form-control' value=''>
      </div>
      <label for='user-title'>Password</label>
        <input type='text' name='password' class='form-control' value=''>
      </div>
      <input type='submit' name='publish' class='btn btn-primary btn-lg' value='Publish'>
  </div>
</form>
<?php require 'footer-admin.php' ?>
