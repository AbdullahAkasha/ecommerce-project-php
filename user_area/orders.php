<?php
include('../includes/connect.php');
include('../functions/common_functions.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}
// getting total items and total price of the cart

$get_id = getIPAddress();
$total_price = 0;
// cart query
$cart_query = "select * from `cart_details` where ip_address = '$get_id'";
$result = mysqli_query($conn, $cart_query);
$incoive_number = mt_rand();
$status = 'pending';
$cart_items = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];
    $select_products = "select * from `products` where product_id = $product_id";
    $result_products = mysqli_query($conn, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_products)) {
        // $product_price = array($row['product_price']);
        // $product_total_price = array_sum($product_price);
        // $total_price += $product_total_price;
        $total_price += $row_product_price['product_price'];
    }
}

// echo $total_price;
// die();

// getting quantity form cart

$cart_query = "select * from `cart_details` where ip_address = '$get_id'";
$result = mysqli_query($conn, $cart_query);
// $cart_items = mysqli_fetch_array($result);
$cart_items = mysqli_num_rows($result);
$quantity = $cart_items['quantity'];
// if ($quantity == 0) {
//     $quantity = 1;
//     $subtotal = $total_price;
// } else {
//     $quantity = $quantity;
//     $subtotal = $total_price * $quantity;
// }
if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_price;
} else {
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}

// insert order

$insert_order_query = "insert into `user_orders` (user_id,amount_due,invoice_number,total_products,order_date,order_status) values
('$user_id','$subtotal','$incoive_number','$cart_items',NOW(),'$status')";
$result = mysqli_query($conn, $insert_order_query);

if ($result) {
    echo "<script>alert('Order placed successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

// Orders pending
$insert_query_pending_orders = "insert into `orders_pending` (user_id,incoive_number,product_id,quantity,order_status)
values ('$user_id','$incoive_number','$product_id','$quantity','$status')";
$result_query = mysqli_query($conn, $insert_query_pending_orders);

// Delete items from cart

$delete_query = "delete from `cart_details` where ip_address = '$get_id'";
$run_delete = mysqli_query($conn, $delete_query);
