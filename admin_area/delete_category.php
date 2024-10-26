<?php

if (isset($_GET['delete_category'])) {
    $delete_category = $_GET['delete_category'];

    $delet_query = "Delete from `categories` where category_id= $delete_category";
    $run_delete = mysqli_query($conn, $delet_query);
    if ($run_delete) {
        echo "<script>alert('Category deleted successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}
