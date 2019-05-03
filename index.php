<?php require 'header.php'; ?>

<div id="wrapper">
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
</div>

<?php require 'footer.php'; ?>
