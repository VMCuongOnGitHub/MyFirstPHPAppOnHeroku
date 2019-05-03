<?php require 'header-admin.php'; ?>

<div class="container-fluid">
  <div class="row">
    <table class="table table-hover">
        <thead>
          <tr>
               <th>Id</th>
               <th>Product Name</th>
               <th>Image</th>
               <th>Category</th>
               <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // SELECT the elements that you want to display from database
          $query = "
            SELECT Product.product_id, Product.product_name, Product.product_image, Product.price, Category.category_name
            FROM Product
            INNER JOIN Category ON Product.category_id = Category.category_id
          ";
          // Make a connection to database and execute the querry
          $select_all_product_query = mysqli_query($connection, $query);
          // Use while loop to show the value
          while ($row = mysqli_fetch_assoc($select_all_product_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_price = $row['price'];
            $product_image = $row['product_image'];

            $category_name = $row['category_name'];

            echo "
              <tr>
                <td>{$product_id}</td>
                <td>
                  <a href='edit-product.php?product_id={$product_id}'><p>{$product_name}</p></a>
                </td>
                <td>
                  <div>
                    <a href='edit-product.php?product_id={$product_id}'><img width='100' src='images/{$product_image}' alt='{$product_name}'></a>
                  </div>
                </td>
                <td>{$category_name}</td>
                <td>{$product_price}</td>
                <td>
                  <a onClick='confirmation()' class='btn btn-danger validate'><span class='glyphicon glyphicon-remove'></span></a>
                </td>
            </tr>
            ";
          }
          ?>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
  function confirmation() {
    var confirmmessage = "Are you sure to delete this user?";
    var message = "Action Was Cancelled";
    if (confirm(confirmmessage)) {
      $(".validate").attr("href", "delete-product.php?product_id=<?php echo "{$product_id}"; ?>");
    } else {
         alert(message);
    }
  }
</script>
<?php require 'footer-admin.php' ?>
