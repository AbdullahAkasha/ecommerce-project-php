<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<style>
    .boldness {
        font-weight: bold;
    }
</style>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST">
                    <!-- User Name Field -->
                    <div class="form-outline mb-4">
                        <label for="user_name" class="form-lable">User Name</label>
                        <input type="text" id="user_name" class="form-control" placeholder="Enter user name"
                            autocomplete="off" required name="user_name">
                    </div>
                    <!-- Password Field -->
                    <div class="form-outline mb-4">
                        <label for="user_Password" class="form-lable">User Password</label>
                        <input type="Password" id="user_Password" class="form-control" placeholder="Enter Password"
                            autocomplete="off" required name="user_Password">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" name="user_login" class="bg-info py-2 px-3 border-0">
                        <p class="small boldness mt-2 pt-1">Don't have an account ? <a class="text-danger"
                                href="../user_area/user_registration.php"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
if (isset($_POST['user_login'])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_Password'];
    $select_query = "select * from `user_table` where user_name = '$user_name'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_id = $row_data['user_id'];
    $user_ip = getIPAddress();

    // Checking cart items in the cart

    $select_query_cart = "select * from `cart_details` where ip_address = '$user_ip'";
    $result_cart = mysqli_query($conn, $select_query_cart);
    $result_check_cart = mysqli_num_rows($result_cart);
    if ($row_count > 0) {
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_id'] = $user_id;
        $user_password = password_verify($user_password, $row_data['user_password']);
        if ($user_password == true) {
            if ($row_count == 1 and $result_check_cart == 0) {
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Login Failed')</script>";
        }
    } else {
        echo "<script>alert('Login Failed')</script>";
    }
}
?>