<?php

include('../includes/connect.php');

if (isset($_POST['insert_cat'])) {
  $cat_title = $_POST['cat_title'];
  // Select data from table
  $select_query = "select * from `categories` where category_title = '$cat_title'";
  $run_select_query = mysqli_query($conn, $select_query);
  $count = mysqli_num_rows($run_select_query);
  if ($count > 0) {
    echo "<script>alert('Category already exists!')</script>";
  } else {
    // Insert data into table
    $insert_cat = "insert into `categories` (category_title) values ('$cat_title')";
    $run_insert_cat = mysqli_query($conn, $insert_cat);
    if ($run_insert_cat) {
      echo "<script>alert('Category has been inserted successfully!')</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Categories</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="../style.css">
</head>

<body>

  <h1 class="text-center">Insert Categories</h1>
  <form action="" method="POST" class="mb-2">
    <div class="input-group w-90 mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
      </div>
      <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-3">
      <input type="submit" class="bg-info p-2 my-3 border-0" name="insert_cat" value="Insert Categories">
    </div>
  </form>
</body>

</html>