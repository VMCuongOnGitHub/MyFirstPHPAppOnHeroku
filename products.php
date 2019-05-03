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
          <h2>Product Price less than $90</h2>
          <!-- Product -->
          <div class="row" id="product-homepage">
            <?php
              // SELECT the elements that you want to display from database
              $query = "SELECT * FROM Product WHERE price < 90 LIMIT 6";
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
                  <div class='col-sm-4 col-lg-4 col-md-4'>
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

          <h2>Product added in 2018</h2>
          <!-- Product -->
          <div class="row" id="product-homepage">
            <?php
              // SELECT the elements that you want to display from database
              $query = "SELECT * FROM Product WHERE YEAR(added_date) = 2018 LIMIT 6";
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
                  <div class='col-sm-4 col-lg-4 col-md-4'>
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

          <h2>Products have more than 4 stars</h2>
          <!-- Product -->
          <div class="row" id="product-homepage">
            <?php
              // SELECT the elements that you want to display from database
              $query = "SELECT * FROM Product WHERE rating >= 4";
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
                  <div class='col-sm-4 col-lg-4 col-md-4'>
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
