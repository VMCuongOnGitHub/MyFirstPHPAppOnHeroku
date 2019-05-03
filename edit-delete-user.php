<?php require 'header-admin.php'; ?>
<div class="container-fluid">
  <div class="row">
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Password</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // SELECT the elements that you want to display from database
          $query = "
            SELECT *
            FROM Users
          ";
          // Make a connection to database and execute the querry
          $select_all_user_query = mysqli_query($connection, $query);
          // Use while loop to show the value
          while ($row = mysqli_fetch_assoc($select_all_user_query)) {
            $user_id = $row['user_id'];
            $user_name = $row['username'];
            $user_password = $row['password'];

            echo "
            <tr>
                <td>{$user_id}</td>
                <td>
                  <a href='edit-user.php?user_id={$user_id}'><p>{$user_name}</p></a>
                </td>
                <td>
                  <p>{$user_password}</p>
                </td>
                <td>
                  <a onClick='confirmation()' class='btn btn-danger validate' ><span class='glyphicon glyphicon-remove'></span></a>
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
      $(".validate").attr("href", "delete-user.php?user_id=<?php echo "{$user_id}"; ?>");
    } else {
         alert(message);
    }
  }
</script>
<!-- href='delete-user.php?user_id={$user_id}' -->
<?php require 'footer-admin.php' ?>
