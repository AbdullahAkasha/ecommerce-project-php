<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h1 class="text-center">View Products</h1>
    <table class="table mt-5 table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Product Title</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Price</th>
                <th scope="col">Total Sold</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $display_products = "SELECT * FROM `products`";
            $result = mysqli_query($conn, $display_products);
            $num = mysqli_num_rows($result);
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $product_status = $row['status'];
                $number++;
            ?>
                <tr class='text-center'>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $product_title; ?></td>
                    <td><img class='product_img' src='../admin_area/product_images/<?php echo $product_image1; ?>' /></td>
                    <td><?php echo $product_price; ?>/-</td>
                    <td><?php
                        $get_count = "select * from `orders_pending` where product_id=$product_id";
                        $result_count = mysqli_query($conn, $get_count);
                        $row_count = mysqli_num_rows($result_count);
                        echo $row_count;
                        ?></td>
                    <td><?php echo $product_status; ?></td>
                    <td><button class='btn btn-info'><a class="text-light" href="index.php?edit_product=<?php echo $product_id; ?>">Edit</a></button></td>
                    <td><button class='btn btn-danger'><a class="text-light" href="index.php?delete_product=<?php echo $product_id; ?>">Delete</a></button></td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>
</body>

</html>