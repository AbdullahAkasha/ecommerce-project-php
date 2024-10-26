<?php

if (isset($_GET['delete_brand'])) {
    $delete_brand = $_GET['delete_brand'];

    $delet_query = "Delete from `brands` where brand_id= $delete_brand";
    $run_delete = mysqli_query($conn, $delet_query);
    if ($run_delete) {
        echo "<script>alert('brand deleted successfully')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}
