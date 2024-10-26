<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>

<?php
$user_ip = getIPAddress();
$get_user = "select * from `user_table` where user_ip = '$user_ip'";
$result = mysqli_query($conn, $get_user);
$row = mysqli_fetch_assoc($result);
$user_id = $row['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .payment-img {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-6">
                <a href="www.google.com"><img class="payment-img" src="user_images/65Z_2201.w012.n001.25B.p12.25.jpg" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="orders.php?user_id=<?php echo $user_id ?>">
                    <h2 class="text-center">Pay Offline</h2>
                </a>
            </div>
        </div>
    </div>
</body>

</html>