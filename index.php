<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS -->
  <link rel="stylesheet" href="style.css">
  <title>Ecommerce Website</title>
</head>

<body>
  <!-- Nav -->
  <?php
  include('includes/header.php');
  ?>

  <!-- cart function calling -->
  <?php
  cart();
  ?>

  <!-- Second Child -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      <?php
      if (!isset($_SESSION['user_name'])) {
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>";
      } else {
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'> Welcome " . $_SESSION['user_name'] . "</a>
      </li>";
      }
      if (!isset($_SESSION['user_name'])) {
        echo "<li class='nav-item'>
                    <a class='nav-link' href='./user_area/user_login.php'>Login</a>
                </li>";
      } else {
        echo "<li class='nav-item'>
                    <a class='nav-link' href='./user_area/user_logout.php'>Logout</a>
                </li>";
      }
      ?>
    </ul>
  </nav>
  <!-- Third Child -->
  <div class="bg-light">
    <h3 class="text-center">Clothing Store</h3>
    <p class="text-center">Communication is at the heart of Ecommerce and Community.</p>
  </div>
  <!-- Fourth Child -->
  <div class="row">
    <div class="col-md-10">
      <!-- All Products -->
      <div class="row">

        <!-- Fetching products -->
        <?php
        // Getting products from common_functions.php file
        getProducts();
        get_unique_categories();
        get_unique_brands();
        $ip = getIPAddress();
        echo 'User Real IP Address - ' . $ip;

        ?>

      </div>
    </div>
    <div class="col-md-2 bg-secondary p-0">
      <!-- Side nav -->
      <!-- Brands -->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light">
            <h4>Brands</h4>
          </a>
        </li>
        <?php
        getBrands();
        ?>
      </ul>
      <!-- Categories -->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light">
            <h4>Categories</h4>
          </a>
        </li>
        <?php
        getCategories();
        ?>
      </ul>
    </div>
  </div>

  <!-- include footer -->
  <?php
  include('includes/footer.php');
  ?>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>