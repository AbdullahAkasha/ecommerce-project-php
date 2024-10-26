<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Accoutn</title>
</head>

<body>
    <h3 class="text-center text-danger">Deleting Account</h3>
    <form action="" method="POST" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Don't Delete Account">
        </div>
    </form>
</body>

</html>

<?php
$usernamesession = $_SESSION['user_name'];
if (isset($_POST['delete'])) {

    $delete_query = "Delete from `user_table` where user_name = '$usernamesession'";
    $run_delete = mysqli_query($conn, $delete_query);
    if ($run_delete) {
        session_destroy();
        echo "<script>alert('Account deleted successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

if (isset($_POST['dont_delete'])) {

    echo "<script>window.open('profile.php','_self')</script>";
}

?>