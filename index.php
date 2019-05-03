<?php require "header.php" ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <p class="lead">Category</p>
            <div class="list-group">
              <?php
                // SELECT the elements that you want to display from database
                $query = "SELECT * FROM Category";
                // Make a connection to database and execute the querry
                $select_category_query = mysqli_query($connection, $query);
                // Use while loop to show the value
                while ($row = mysqli_fetch_assoc($select_category_query)) {
                  $category_id = $row['category_id'];
                  $category_name = $row['category_name'];

                  echo "
                    <a href='product-category.php?category_id={$category_id}' class='list-group-item'>{$category_name}<a>
                  ";
                }
              ?>
            </div>
        </div>

        <div class="col-md-9">
          <div id="init-me-slider" class="carousel slide hero-section" data-ride="carousel">
            <!-- Indicators -->
            <ul class='carousel-indicators'>
              <li data-target='#init-me-slider' data-slide-to="0" class="active"></li>
              <?php
                  $query = "SELECT * FROM Slider";

                  $result = mysqli_query($connection, $query);
                  $data = mysqli_fetch_assoc($result);
                  // print_r($data);
                  for ($i=1; $i < count($data); $i++) {
                    echo "
                      <li data-target='#init-me-slider' data-slide-to='{$i}'></li>
                    ";
                  }
              ?>
            </ul>
            <!-- The slideshow -->
            <div class='carousel-inner'>
              <?php
                // SELECT the elements that you want to display from database
                $query_select_first_image = "SELECT * FROM Slider LIMIT 1";
                // Make a connection to database and execute the querry
                $select_first_slider_query = mysqli_query($connection, $query_select_first_image);
                // Use while loop to show the value
                while ($row = mysqli_fetch_assoc($select_first_slider_query)) {
                  $slider_image_active = $row['slider_image'];
                  $slider_image_name_active = $row['image_name'];

                  echo "
                    <div class='carousel-item active image-hero'>
                      <img height='450px' class='hero-section mx-auto d-block' src='admin/images/{$slider_image_active}' alt='{$slider_image_name_active}'>
                    </div>
                  ";
                }
              ?>
              <?php
                // SELECT the elements that you want to display from database
                $query = "SELECT * FROM Slider LIMIT 100 OFFSET 1";
                // Make a connection to database and execute the querry
                $select_all_slider_query = mysqli_query($connection, $query);
                // Use while loop to show the value
                while ($row = mysqli_fetch_assoc($select_all_slider_query)) {
                  $slider_image = $row['slider_image'];
                  $slider_image_name = $row['image_name'];
                    echo "
                      <div class='carousel-item image-hero'>
                        <img height='450px' class='mx-auto d-block' src='admin/images/{$slider_image}' alt='{$slider_image_name}'>
                      </div>
                    ";
                }
              ?>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#init-me-slider" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#init-me-slider" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>

          <!-- Product -->
          <div class="row" id="product-homepage">
            <?php
              // SELECT the elements that you want to display from database
              $query = "SELECT * FROM Product";
              // Make a connection to database and execute the querry
              $select_all_product_query = mysqli_query($connection, $query);
              // Use while loop to show the value
              while ($row = mysqli_fetch_assoc($select_all_product_query)) {
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $product_price = $row['price'];
                $product_shortDescription = $row['short_description'];
                $product_image = $row['product_image'];

                echo "
                  <div class='col-sm-4 col-lg-4 col-md-4 select-effect'>
                      <div class='product-item'>
                        <a href='item.php?product_id={$product_id}'>
                          <img src='admin/images/{$product_image}' alt='{$product_name}' class='img-thumbnail'>
                        </a>
                        <div class='caption'>
                            <h4 class='pull-right'><span>$</span> {$product_price}</h4>
                            <h4><a href='item.php?product_id={$product_id}'>{$product_name}</a></h4>
                            <p>{$product_shortDescription}</p>
                        </div>
                      </div>
                  </div>
                ";
              }
            ?>
          </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
