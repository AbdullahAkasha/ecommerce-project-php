<!-- Navbar  -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <img src="./images/logo-1.png" alt="Logo" class="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="display_all.php">All Products</a>
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
                <!-- <li class="nav-item">
                    <a class="nav-link" href="./user_area/user_registration.php">Register</a>
                </li> -->
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
            <form class="form-inline my-2 my-lg-0" method="get" action="search_products.php">
                <input class="form-control mr-sm-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
                <!-- <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button> -->
                <input type="submit" value="search" name="search_data_product" class="btn btn-outline-light my-2 my-sm-0">
            </form>
        </div>
    </nav>