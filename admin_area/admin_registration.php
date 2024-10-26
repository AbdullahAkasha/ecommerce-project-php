<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/product-1.jpg" alt="Admin registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form method="POST">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-lable">User Name</label>
                        <input type="text" name="admin_name" id="username" required="required"
                            autocomplete="off" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-lable">Email</label>
                        <input type="email" name="admin_email" id="email" required="required"
                            autocomplete="off" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-lable">Password</label>
                        <input type="password" name="admin_Password" id="password" required="required"
                            autocomplete="off" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-lable">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" required="required"
                            autocomplete="off" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0"
                            value="Register" name="admin_registration">
                        <p class="small font-weight-bold mt-2 pt-1">Already have an account?
                            <a class="text-danger" href="admin_login.php">Login
                        </p>
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
if (isset($_POST['admin_registration'])) {
    $admin_user_name = $_POST['admin_name'];
    $admin_user_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_Password'];
    $confirm_admin_Password = $_POST['confirm_password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $user_ip = getIPAddress();


    $select_query = "select * from `admin_table` where admin_email = '$admin_user_email' 
    or admin_name = '$admin_user_name'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        echo "<script>alert('User Already Exists')</script>";
    } else if ($admin_password != $confirm_admin_Password) {
        echo "<script>alert('Password Does Not Match')</script>";
    } else {
        $insert_query = "insert into `admin_table` (admin_name,admin_email,admin_password) 
        values ('$admin_user_name','$admin_user_email','$hash_password')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script>alert('Admin Registered Successfully')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
        }
    }
}
