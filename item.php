<?php require "header.php" ?>
<!-- Page Content -->
<div class="container">
  <div class="row">
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

      $product_name = $row['product_name'];
      $product_image = $row['product_image'];
      $product_price = $row['price'];
      $product_rating = $row['rating'];
      $product_shortDescription = $row['short_description'];

      echo "
      <div class='col-md-7'>
        <img class='img-thumbnail' src='admin/images/{$product_image}' alt='{$product_name}' height='600px' width='700px'>
      </div>
      <div class='col-md-5'>
        <div class='thumbnail'>
          <div class='caption-full'>
            <h4><a href=''>{$product_name}</a></h4>
            <hr>
            <h4 class=''><span>$</span> {$product_price}</h4>
      ";
    ?>

    <?php
      echo "
        <div class='ratings'>
          <p>
      ";
      for ($i=0; $i < $product_rating; $i++) {
        echo "
          <i class='fas fa-star'></i>
        ";
      }
      for ($i= $product_rating; $i < 5; $i++) {
        echo "
          <i class='far fa-star'></i>
        ";
      }
      echo "
          {$product_rating} stars
        </p>
      </div>
      ";
    ?>

    <?php
      echo "
            <p>{$product_shortDescription}</p>
            <form action='POST'>
              <div class='form-group'>
                  <input type='submit' class='btn btn-primary' value='ADD TO CART'>
              </div>
            </form>
          </div>
        </div>
      </div>
      ";
    ?>
  </div>


  <hr>


  <div class="row">
    <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="nav-item"><a class="nav-link active" href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
        <li role="presentation" class="nav-item"><a class="nav-link" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
      </ul>
      <div class="tab-content">
        <!-- Tab Content for id #home -->
        <div role="tabpanel" class="tab-pane active" id="home">
          <p></p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
        </div>
        <!-- End Tab Content for id #home -->

        <!-- Tab Content for id #profile -->
        <div role="tabpanel" class="tab-pane" id="profile">
          <div class="col-md-6">
            <h3>2 Reviews From </h3>
            <hr>
            <div class="row">
              <div class="col-md-12">
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  Anonymous
                  <span class="pull-right">10 days ago</span>
                  <p>This product was great in terms of quality. I would definitely buy another!</p>
              </div>
            </div>
            <hr>
          </div>
          <div class="col-md-6">
            <h3>Add A review</h3>
            <form action="" class="form-inline">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" >
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="test" class="form-control">
              </div>
              <div>
                  <h3>Your Rating</h3>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
              </div>
              <br>
              <div class="form-group">
                <textarea name="" id="" cols="60" rows="10" class="form-control"></textarea>
              </div>
              <br>
              <br>
              <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="SUBMIT">
              </div>
            </form>
          </div>
        </div>
        <!-- End Tab Content for id #profile -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php" ?>
