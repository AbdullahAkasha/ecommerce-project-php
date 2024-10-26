<?php

if (isset($_GET['delete_product'])) {
    $id = $_GET['delete_product'];
    // echo $id;
    // delete query

    $delete_query = "delete from `products` where product_id = $id";
    $result = mysqli_query($conn, $delete_query);
    if ($result) {
        echo "<script>alert('Product Deleted Successfully!!')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}
