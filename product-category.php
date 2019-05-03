<?php require "header.php" ?>
<div class="container">

  <div class="row">
      <div class="col-lg-12">
        <?php
          if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
            $query = "
              SELECT *
              FROM Category
              WHERE Category.category_id = '{$category_id}'
            ";
            // Make a connection to database and execute the querry
            $select_category_query = mysqli_query($connection, $query);
            // Use while loop to show the value
            $row = mysqli_fetch_assoc($select_category_query);
            $category_name = $row['category_name'];
            $short_description = $row['short_description'];
            echo "
              <h3>{$category_name}</h3>
              <p>{$short_description}</p>
              <hr>
            ";
          }
        ?>
      </div>
  </div>

  <div class="row">
    <?php
      if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
      }
      // SELECT the elements that you want to display from database
      $query = "
        SELECT Product.product_id, Product.product_name, Product.product_image, Product.price, Product.short_description, Category.category_name, Category.category_id
        FROM Product
        INNER JOIN Category ON Product.category_id = Category.category_id
        WHERE Category.category_id = '{$category_id}'
      ";
      // Make a connection to database and execute the querry
      $select_all_product_category_query = mysqli_query($connection, $query);
      // Use while loop to show the value
      while ($row = mysqli_fetch_assoc($select_all_product_category_query)) {
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
<?php include "footer.php" ?>
