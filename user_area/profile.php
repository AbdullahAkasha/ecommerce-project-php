<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
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
    <title>Ecommerce Website - User Profile</title>
    <style>
        body {
            overflow-x: hidden;
        }

        .profile-img {
            width: 200px;
            height: 200px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <!-- Nav -->
    <!-- Navbar  -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <img src="../images/logo-1.png" alt="Logo" class="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">All Products</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user_name'])) {
                        echo "<li class='nav-item'>
                    <a class='nav-link' href='./user_area/profile.php'>My Profile</a>
                </li>";
                    } else {
                        echo "<li class='nav-item'>
                    <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
                </li>";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="get" action="../search_products.php">
                    <input class="form-control mr-sm-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
                    <!-- <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button> -->
                    <input type="submit" value="search" name="search_data_product" class="btn btn-outline-light my-2 my-sm-0">
                </form>
            </div>
        </nav>

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
            <div class="col-md-2 p-0">
                <ul class="navbar-nav bg-secondary text-center" style="height: 100vh;">
                    <li class='nav-item bg-info'>
                        <a class='nav-link text-light' href='#'>
                            <h4>Your Profile</h4>
                        </a>
                    </li>
                    <?php
                    $username = $_SESSION['user_name'];
                    $select_query = "select * from user_table where user_name = '$username'";
                    $result = mysqli_query($conn, $select_query);
                    $row = mysqli_fetch_array($result);
                    $user_image = $row['user_image'];
                    echo "<li class='nav-item'>
                        <img class='profile-img' src='../user_area/user_images/$user_image' alt=''>
                    </li>";
                    ?>
                    <li class='nav-item'>
                        <a class='nav-link text-light' href='profile.php?pending_orders'>
                            Pending Orders
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link text-light' href='profile.php?edit_account'>
                            Edit Account
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link text-light' href='profile.php?my_orders'>
                            My Orders
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link text-light' href='profile.php?delete_account'>
                            Delete Account
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link text-light' href='logout.php'>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <?php user_pending_order();
                if (isset($_GET['edit_account'])) {
                    include('edit_account.php');
                }
                if (isset($_GET['my_orders'])) {
                    include('user_orders.php');
                }
                if (isset($_GET['delete_account'])) {
                    include('delete_account.php');
                }
                ?>
            </div>
        </div>

        <!-- include footer -->
        <?php
        include('../includes/footer.php');
        ?>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>