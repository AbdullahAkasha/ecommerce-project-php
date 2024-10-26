<?php
include('../includes/connect.php');
session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_query = "select * from `user_orders` where order_id = $order_id";
    $result_query = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_assoc($result_query);
    $invoice_number = $row['invoice_number'];
    $amount_due = $row['amount_due'];
    // if ($order_status == 'pending') {
    //     $update_query = "update `user_orders` set order_status = 'confirm' where order_id = $order_id";
    //     $update_result = mysqli_query($conn, $update_query);
    //     if ($update_result) {
    //         $_SESSION['success'] = "Payment confirmed successfully";
    //         echo "<script>window.open('profile.php','_self')</script>";
    //     }
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Payment Page</title>
</head>

<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-white my-5">Confirm Payment</h1>
        <form action="" method="POST">
            <div class="form-outline mt-4 text-center w-50 m-auto">
                <input type="text" class="form-control mt-5 w-50 m-auto"
                    value="<?php echo $invoice_number ?>" name="invoice_number">
            </div>
            <div class="form-outline mt-4 text-center w-50 m-auto">
                <label for="" class="text-light mt-2">Amount</label>
                <input type="text" class="form-control mb-5 w-50 m-auto"
                    value="<?php echo $amount_due ?>" name="amount">
            </div>
            <div class="form-outline pt-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-control w-50 m-auto">
                    <option value="">Select payment mode</option>
                    <option value="">Paypal</option>
                    <option value="">Stripe</option>
                    <option value="">Pay Off line</option>
                    <option value="">Cash on delivery</option>
                </select>
            </div>
            <div class="form-outline mt-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info mt-5 py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
</body>

</html>
<?php

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount =         $_POST['amount'];
    $payment_mode =   $_POST['payment_mode'];
    $insert_query = "insert into `all_payments` (invoice_number,amount,payment_mode) values 
    ('$invoice_number',$amount,'$payment_mode')";
    $run_query = mysqli_query($conn, $insert_query);
    if ($run_query) {
        $update_query = "update `user_orders` set order_status = 'confirm' where invoice_number = $invoice_number";
        $run_update = mysqli_query($conn, $update_query);
        if ($run_update) {
            echo "<h3 class='text-center text-light'>Successfully confirmed</h3>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
    }
}
?>