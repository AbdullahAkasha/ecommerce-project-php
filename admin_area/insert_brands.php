<h1 class="text-center">Insert Brands</h1>
<form action="" method="POST" class="mb-2">
  <div class="input-group w-90 mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    </div>
    <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="brands" aria-describedby="basic-addon1">
  </div>
  <div class="input-group w-10 mb-3">
    <input type="submit" class="bg-info p-2 my-3 border-0" name="insert_brand" value="Insert Brand">
  </div>
</form>

<?php

include('../includes/connect.php');

if (isset($_POST['insert_brand'])) {
  $brand_title = $_POST['brand_title'];
  // Select data from table
  $select_query = "select * from `brands` where brand_title = '$brand_title'";
  $run_select_query = mysqli_query($conn, $select_query);
  $count = mysqli_num_rows($run_select_query);
  if ($count > 0) {
    echo "<script>alert('Brand already exists!')</script>";
  } else {
    // Insert data into table
    $insert_brand = "insert into `brands` (brand_title) values ('$brand_title')";
    $run_insert_brand = mysqli_query($conn, $insert_brand);
    if ($run_insert_brand) {
      echo "<script>alert('Brand has been inserted successfully!')</script>";
    }
  }
}


?>