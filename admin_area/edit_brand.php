<?php
if (isset($_GET['edit_brand'])) {
    $edit_id = $_GET['edit_brand'];
    $edit_brand = "select * from `brands` where brand_id = $edit_id";
    $edit_result = mysqli_query($conn, $edit_brand);
    $fetch_data = mysqli_fetch_assoc($edit_result);
    $brand_title = $fetch_data['brand_title'];
}

if (isset($_POST['update_brand'])) {
    $brand_title = $_POST['brand_title'];
    $update_query = "update `brands` set brand_title= '$brand_title' where brand_id = $edit_id";
    $result = mysqli_query($conn, $update_query);
    if ($result) {
        echo "<script>alert('Brand updated successfully')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}

?>


<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form class="text-center" action="" method="POST">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label mt-3">Brand Title</label>
            <input type="text" class="form-control w-50 m-auto" required name="brand_title"
                value="<?php echo $brand_title ?>" autocomplete="off" id="brand_title">
        </div>
        <input type="submit" value="Update Brand" class="btn btn-info px-3 mt-3" name="update_brand">
    </form>
</div>