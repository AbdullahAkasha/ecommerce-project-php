<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
        <h2 class="text-center">User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- User Name Field -->
                    <div class="form-outline mb-4">
                        <label for="user_name" class="form-lable">User Name</label>
                        <input type="text" id="user_name" class="form-control" placeholder="Enter user name"
                            autocomplete="off" required name="user_name">
                    </div>
                    <!-- Email Field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-lable">User Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter user email"
                            autocomplete="off" required name="user_email">
                    </div>
                    <!-- Image Field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-lable">User Image</label>
                        <input type="file" id="user_image" class="form-control" required name="user_image">
                    </div>
                    <!-- Password Field -->
                    <div class="form-outline mb-4">
                        <label for="user_Password" class="form-lable">User Password</label>
                        <input type="Password" id="user_Password" class="form-control" placeholder="Enter Password"
                            autocomplete="off" required name="user_Password">
                    </div>
                    <!-- Confirm Password Field -->
                    <div class="form-outline mb-4">
                        <label for="confirm_user_Password" class="form-lable">Confirm User Password</label>
                        <input type="Password" id="confirm_user_Password" class="form-control" placeholder="Confirm  Password"
                            autocomplete="off" required name="confirm_user_Password">
                    </div>
                    <!-- Address Field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-lable">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter Address"
                            autocomplete="off" required name="user_address">
                    </div>
                    <!-- Contact Field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-lable">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter Contact Number"
                            autocomplete="off" required name="user_contact">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" name="user_register" class="bg-info py-2 px-3 border-0">
                        <p class="small boldness mt-2 pt-1">Already have an account ? <a class="text-danger" href="user_login.php"> Login</a></p>
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
if (isset($_POST['user_register'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_Password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $confirm_user_Password = $_POST['confirm_user_Password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $temp_name = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();
    $user_image = $_FILES['user_image']['name'];


    $select_query = "select * from `user_table` where user_email = '$user_email' and user_name = '$user_name'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        echo "<script>alert('Email or User Name Already Exists')</script>";
    } else if ($user_password != $confirm_user_Password) {
        echo "<script>alert('Password Does Not Match')</script>";
    } else {
        move_uploaded_file($temp_name, "user_images/$user_image");
        $insert_query = "insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
        values ('$user_name','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script>alert('User Registered Successfully')</script>";
            echo "<script>window.open('user_login.php','_self')</script>";
        }
    }
}
//  Slecting items in the cart

$select_cart_items = "select * from `cart_details` where ip_address = '$user_ip'";
$result_cart = mysqli_query($conn, $select_cart_items);
$result_check = mysqli_num_rows($result_cart);
if ($result_check > 0) {
    $_SESSION['username'] = $user_name;
    echo "<script>alert('You have some items in the cart')</script>";
    echo "<script> window.open('checkout.php','_self')</script>";
} else {
    // echo "<script>window.open('../index.php','_self')</script>";
}


?>