<?php require 'header.php'; ?>
<?php

  if (isset($_POST['username'])) {
      $user = sanitizeString($_POST['username']);
      $pass = sanitizeString($_POST['password']);
      if ($user == "" || $pass == "") {
          $error = "Not all fields was entered";
      } else {
          $token = passwordToToken($pass);
          $query = "SELECT * FROM Users WHERE username = '$user' AND password = '$token'";
          $check_user_query = mysqli_query($connection, $query);
          $row = mysqli_fetch_assoc($check_user_query);

          if ($check_user_query->num_rows == 0) {
              $error = "Username/Password invalid";
          } else {
              session_start();
              $_SESSION['uId'] = mysqli_fetch_array($result)[0];
              $_SESSION['user'] = $user;
              $_SESSION['pass'] = $pass;

              header("Location: admin/backend.php"); //redirect to index.php
              die("You already log in. Please <a href='admin/index.php'>click here</> to continue.");
          }
      }
  }
?>
<div class="container">

  <header>
    <div class="row">
      <div class="col-sm-4"></div>

      <div class="col-sm-4 col-sm-offset-5">
        <h1 class="text-center">Login to Admin</h1>
        <form class="text-center" action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
          </div>

          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" >
          </div>

        </form>
      </div>

      <div class="col-sm-4"></div>
    </div>
  </header>
</div>
<?php require 'footer.php'; ?>
