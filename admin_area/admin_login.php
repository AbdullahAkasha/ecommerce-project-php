<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/product-1.jpg" alt="Admin registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form method="POST">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-lable">User Name</label>
                        <input type="text" name="admin_username" id="username" required="required"
                            autocomplete="off" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-lable">Password</label>
                        <input type="password" name="admin_password" id="password" required="required"
                            autocomplete="off" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0"
                            value="Login" name="admin_login">
                        <p class="small font-weight-bold mt-2 pt-1">Don't have an account?
                            <a class="text-danger" href="admin_registration.php">Register
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

if (isset($_POST['admin_login'])) {
    $admin_user_name = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $select_query = "select * from `admin_table` where admin_name = '$admin_user_name'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    if ($row_count > 0) {
        $_SESSION['admin_name'] = $admin_user_name;
        $admin_password = password_verify($admin_password, $row_data['admin_password']);
        if ($admin_password == true) {
            if (isset($_SESSION['admin_name'])) {
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Login Failed')</script>";
        }
    } else {
        echo "<script>alert('Login Failed')</script>";
    }
}
?>