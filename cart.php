<?php
include('includes/connect.php');
include('functions/common_functions.php');

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
    <title>Ecommerce Website - Cart Page</title>
    <style>
        .img-width {
            width: 80px;
            height: auto;
        }
    </style>
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
            <li class="nav-item">
                <a class="nav-link" href="#">Welcome Guest</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li>
        </ul>
    </nav>
    <!-- Third Child -->
    <div class="bg-light">
        <h3 class="text-center">Clothing Store</h3>
        <p class="text-center">Communication is at the heart of Ecommerce and Community.</p>
    </div>

    <!-- Fourth Child -->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <form action="" method="POST">
                <table class="table table-border text-center">

                    <tbody>
                        <?php
                        $total = 0;
                        global $conn;
                        $ip = getIPAddress();
                        $select_query = "select * from `cart_details` where ip_address = '$ip'";
                        $result_query = mysqli_query($conn, $select_query);
                        $count_cart_items = mysqli_num_rows($result_query);
                        if ($count_cart_items > 0) {
                            echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>";
                            while ($row = mysqli_fetch_array($result_query)) {
                                $product_id = $row['product_id'];
                                $select_products = "select * from `products` where product_id = '$product_id'";
                                $result_products = mysqli_query($conn, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $price_title = $row_product_price['product_title'];
                                    $price_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total += $product_values;
                        ?>
                                    <tr>
                                        <td><?php echo $price_title ?></td>
                                        <td><img src="admin_area/product_images/<?php echo $price_image1 ?>" width="80px" height="auto" alt=""></td>
                                        <td><input type="number" class="form-input w-50" name="qty" value="<?php echo $row['quantity'] ?>"> </td>
                                        <?php
                                        global $conn;
                                        $get_ip = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $qty = $_POST['qty'];
                                            $update_cart = "UPDATE `cart_details` SET quantity = $qty WHERE ip_address = '$get_ip'";
                                            $result_quantity = mysqli_query($conn, $update_cart);
                                            $total = $total * $qty;
                                        }

                                        // calling the remove from cart function
                                        remove_item();

                                        ?>
                                        <td><?php echo $product_values ?></td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <!-- <button class="bg-info px-3 py-2">Update</button> -->
                                            <input type="submit" class="bg-info px-3 py-2" name="update_cart"
                                                value="Update">
                                            <!-- <button class="bg-info px-3 py-2">Remove</button> -->
                                            <input type="submit" class="bg-info px-3 py-2" name="remove_item"
                                                value="Remove">
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Sub Totle -->
                <div class="d-flex mb-5">
                    <?php
                    global $conn;
                    $ip = getIPAddress();
                    $select_query = "select * from `cart_details` where ip_address = '$ip'";
                    $result_query = mysqli_query($conn, $select_query);
                    $count_cart_items = mysqli_num_rows($result_query);
                    if ($count_cart_items > 0) {
                        echo "<div class='d-flex mb-5'>
                    <h4 class='px-3'>Sub Totle: <strong class='text-info'> $total -/</strong> </h4>
                    <button class='bg-info mx-3 px-3 py-2'> <a href='index.php' class='text-light'>Continue Shopping</a></button>
                    <button class='bg-secondary px-3 py-2'><a class='text-light text-decoration-none' href='./user_area/checkout.php'>Checkout</a></button>
                </div>";
                    } else {
                        echo "
                    <div><button class='bg-info mx-3 px-3 py-2'> <a href='index.php' class='text-light'>Continue Shopping</a></button>
                    </div>
";
                    }
                    ?>
                </div>
        </div>
    </div>
    </form>

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