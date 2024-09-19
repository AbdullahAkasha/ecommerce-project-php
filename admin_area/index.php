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
    crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="../style.css">
    <title>Admin Dashboard</title>
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
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
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
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button><a href="insert_products.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Log Out</a></button>
                </div>
            </div>
         </div>

         <!-- Fourth Child -->

         <div class="container my-5">
            <?php 
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');}
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');}
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
