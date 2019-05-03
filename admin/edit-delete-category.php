<?php require 'header-admin.php'; ?>
<div class="container-fluid">
  <div class="row">
    <table class="table table-hover">
        <thead>
          <tr>
               <th>Id</th>
               <th>Category Name</th>
               <th>Category Image</th>
               <th>Category Description</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // SELECT the elements that you want to display from database
          $query = "
            SELECT category_id, category_name, category_image, short_description
            FROM Category
          ";
          // Make a connection to database and execute the querry
          $select_all_category_query = mysqli_query($connection, $query);
          // Use while loop to show the value
          while ($row = mysqli_fetch_assoc($select_all_category_query)) {
            $category_id = $row['category_id'];
            $category_name = $row['category_name'];
            $category_image = $row['category_image'];
            $short_description = $row['short_description'];

            echo "
            <tr>
                <td>{$category_id}</td>
                <td>
                  <a href='edit-category.php?category_id={$category_id}'><p>{$category_name}</p></a>
                </td>
                <td>
                  <div>
                    <a href='edit-category.php?category_id={$category_id}'><img width='100' src='images/{$category_image}' alt='{$category_name}'></a>
                  </div>
                </td>
                <td>{$short_description}</td>
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
      $(".validate").attr("href", "delete-category.php?category_id=<?php echo "{$category_id}"; ?>");
    } else {
         alert(message);
    }
  }
</script>
<?php require 'footer-admin.php' ?>
