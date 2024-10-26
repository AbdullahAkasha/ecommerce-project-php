<?php

if (isset($_GET['delete_order'])) {
    $delete_id = $_GET['delete_order'];
    $delete_order = "delete from `user_orders` where order_id = $delete_id";
    $delete_order_result = mysqli_query($conn, $delete_order);
    if ($delete_order_result) {
        echo "<script>alert('Order deleted successfully')</script>";
        echo "<script>window.open('index.php?all_orders','_self')</script>";
    }
}
