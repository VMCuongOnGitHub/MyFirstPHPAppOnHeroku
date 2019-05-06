<?php require 'header.php'; ?>

<?php
  $sql = "SELECT username, user_password FROM users";
  $stmt = $pdo->prepare($sql);
  //Thiết lập kiểu dữ liệu trả về
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $stmt->execute();
  $resultSet = $stmt->fetchAll();
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo $username;
    echo $password;

    foreach ($resultSet as $row) {
      if ($username == $row['username'] && $password ==  $row['user_password']){
        sprint($resultSet);
        //header("Location: view-product.php");
      }else{
        echo '
          <script>
            alert("WRONG! Wanna try again?");
          </script>
        ';
      }
    }

  }

?>
  <div class="container">
    <header>
      <div class="row">
        <div class="col-sm-4"></div>

        <div class="col-sm-4">
          <h1 class="text-center">Login to Admin</h1>
          <form class="text-center" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control">
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-dark" >
              <button type="button" name="button" class="btn btn-primary">Sign up</button>
            </div>


          </form>
        </div>

        <div class="col-sm-4"></div>
      </div>
    </header>
  </div>

<?php require 'footer.php'; ?>
