<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../style.css">
    <title>Admin Dashboard</title>
    <style>
        .product_img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .product_image1 {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <!-- Nav bar -->
    <!-- Child One -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand navbar-light bg-info">
            <div class="container-fluid">
                <img class="logo" src="../images/logo-1.png" alt="">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <?php
                        if (!isset($_SESSION['admin_name'])) {
                            echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>";
                        } else {
                            echo "<li class='nav-item'>
        <a class='nav-link' href='#'> Welcome " . $_SESSION['admin_name'] . "</a>
      </li>";
                        }
                        if (!isset($_SESSION['admin_name'])) {
                            echo "<li class='nav-item'>
                    <a class='nav-link' href='admin_login.php'>Login</a>
                </li>";
                        } else {
                            echo "<li class='nav-item'>
                    <a class='nav-link' href='admin_logout.php'>Logout</a>
                    
                </li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- Child Two -->
        <div class="bg-light">
            <h3 class="text-center">Admin Dashboard</h3>
            <p class="text-center">Manage all your products from here</p>
        </div>
        <div class="row m-0">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5 py-3">
                    <a href=""><img class="admin-image" src="../images/product-1.jpg" alt=""></a>
                    <p class="text-light text-center"><?php echo isset($_SESSION['admin_name']) ?
                                                            $_SESSION['admin_name'] : 'Guest'; ?></p>
                </div>
                <?php
                if (isset($_SESSION['admin_name'])) {
                    echo "<div class='button'>
                    <button><a href='insert_products.php' class='nav-link text-light bg-info my-1'>Insert Products</a></button>
                    <button><a href='index.php?view_products' class='nav-link text-light bg-info my-1'>View Products</a></button>
                    <button><a href='index.php?insert_category' class='nav-link text-light bg-info my-1'>Insert Categories</a></button>
                    <button><a href='index.php?view_categories' class='nav-link text-light bg-info my-1'>View Categories</a></button>
                    <button><a href='index.php?insert_brand' class='nav-link text-light bg-info my-1'>Insert Brands</a></button>
                    <button><a href='index.php?view_brands' class='nav-link text-light bg-info my-1'>View Brands</a></button>
                    <button><a href='index.php?all_orders' class='nav-link text-light bg-info my-1'>All Orders</a></button>
                    <button><a href='index.php?all_payments' class='nav-link text-light bg-info my-1'>All Payments</a></button>
                    <button><a href='index.php?all_users' class='nav-link text-light bg-info my-1'>List Users</a></button>
                </div>";
                } else {
                    echo "<div class='text-center'>
                    <h2 class='text-center'>You need to login first to see the Dashboard</h2>
                    </div>";
                }
                ?>
            </div>
        </div>

        <!-- Fourth Child -->

        <div class="container my-5">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_product'])) {
                include('edit_product.php');
            }
            if (isset($_GET['delete_product'])) {
                include('delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['edit_brand'])) {
                include('edit_brand.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('delete_brand.php');
            }
            if (isset($_GET['all_orders'])) {
                include('all_orders.php');
            }
            if (isset($_GET['delete_order'])) {
                include('delete_order.php');
            }
            if (isset($_GET['all_payments'])) {
                include('all_payments.php');
            }
            if (isset($_GET['all_users'])) {
                include('all_users.php');
            }
            ?>
        </div>

        <!-- Footer -->

        <div class="bg-info p-3 text-center">
            <p>All Copy Right Reserved!</p>
        </div>
    </div>

    </div>





    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>



</body>

</html>