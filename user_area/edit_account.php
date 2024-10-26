<?php

if (isset($_GET['edit_account'])) {
    $username_session = $_SESSION['user_name'];

    // Fetch user data
    $select_query = "SELECT * FROM user_table WHERE user_name = '$username_session'";
    $result = mysqli_query($conn, $select_query);

    // Check if the query was successful and returned a row
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $user_id = $row['user_id'];
        $username = $row['user_name'];
        $user_email = $row['user_email'];
        $user_address = $row['user_address'];
        $user_mobile = $row['user_mobile'];
        $user_image = $row['user_image']; // Store the current user image
    } else {
        // Handle the case when no user data is found
        echo "<script>alert('User not found.'); window.open('user_logout.php','_self');</script>";
        exit();
    }
}

if (isset($_POST['user_update'])) {
    // Sanitize user input
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $temp_name = $_FILES['user_image']['tmp_name'];

    // Handle image upload
    if (!empty($user_image)) {
        move_uploaded_file($temp_name, "./user_images/$user_image");
    } else {
        // If no new image is uploaded, keep the existing image
        $user_image = $row['user_image'];
    }

    // Update query
    $update_query = "UPDATE `user_table` SET user_name = '$user_name', 
        user_email = '$user_email', user_address = '$user_address', user_mobile = '$user_mobile',
        user_image = '$user_image' WHERE user_id = '$user_id'";

    $run_update = mysqli_query($conn, $update_query);

    if ($run_update) {
        echo "<script>alert('Account Updated Successfully!')</script>";
        echo "<script>window.open('user_logout.php','_self')</script>";
    } else {
        echo "<script>alert('Error updating account. Please try again.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        .edit-image {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <h3 class="text-center text-success mb-3">Edit Account</h3>
    <form action="" method="POST" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="user_name">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image">
            <img class="edit-image mb-4" src="./user_images/<?php echo $user_image ?>" alt="">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile">
        </div>
        <input type="submit" class="btn btn-info py-2 px-3" value="Update" name="user_update">
    </form>
</body>

</html>