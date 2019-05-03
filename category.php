<?php require "header.php" ?>
<div class="container">
  <div class="row">
      <div class="col-lg-12">
          <h3>Category</h3>
      </div>
  </div>

  <div class="row">

            <?php
              // SELECT the elements that you want to display from database
              $query = "SELECT * FROM Category";
              // Make a connection to database and execute the querry
              $select_all_category_query = mysqli_query($connection, $query);
              // Use while loop to show the value
              while ($row = mysqli_fetch_assoc($select_all_category_query)) {
                $category_id = $row['category_id'];
                $category_image = $row['category_image'];
                $category_name = $row['category_name'];
                $short_description = $row['short_description'];
                echo "
                <div class='col-md-4 col-sm-4 text-center'>
                    <div class='thumbnail'>
                      <a href='product-category.php?category_id={$category_id}'>
                        <img class='img-thumbnail' src='admin/images/{$category_image}' alt='{$category_name}'>
                        <div class='category-information'>
                            <h3>{$category_name}</h3>
                        </div>
                      </a>
                    </div>
                </div>
                ";
              }
            ?>


  </div>
</div>
<?php include "footer.php" ?>


<!--
1/ So luong khach hang su dung he thong cu tren di dong la bao nhieu moi thang
  Chua nam duoc, chua cos chuc nang thong ke, chi de tim kiem, chua luu dc du lieu giao dich
2/ trung binh moi thang co bao nhieu nguoi dat hang tren he thong cu
  Chua ro, phan mem chua do dem duowcj
3/ khach hangf hay nghe nhac tren nen tang nao
  Khac hang chi mua thoi, ko ro theo nghe nen tang nao, cnang nhieu nan tang cang tot
-->
