<?php
if (isset($_GET['edit_category'])) {
    $edit_id = $_GET['edit_category'];
    $edit_cat = "select * from `categories` where category_id = $edit_id";
    $edit_result = mysqli_query($conn, $edit_cat);
    $fetch_data = mysqli_fetch_assoc($edit_result);
    $category_title = $fetch_data['category_title'];
}

if (isset($_POST['update_category'])) {
    $cat_title = $_POST['category_title'];
    $update_query = "update `categories` set category_title= '$cat_title' where category_id = $edit_id";
    $result = mysqli_query($conn, $update_query);
    if ($result) {
        echo "<script>alert('Category updated successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}

?>


<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form class="text-center" action="" method="POST">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label mt-3">Category Title</label>
            <input type="text" class="form-control w-50 m-auto" required name="category_title"
                value="<?php echo $category_title ?>" autocomplete="off" id="category_title">
        </div>
        <input type="submit" value="Update Category" class="btn btn-info px-3 mt-3" name="update_category">
    </form>
</div>