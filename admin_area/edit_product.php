<?php
if (isset($_GET['edit_product'])) {
    $edit_id = $_GET['edit_product'];
    $edit_query = "select * from `products` where product_id = $edit_id";
    $edit_result = mysqli_query($conn, $edit_query);
    $fetch_edit_data = mysqli_fetch_assoc($edit_result);
    $product_title = $fetch_edit_data['product_title'];
    $product_description = $fetch_edit_data['product_description'];
    $product_keywords = $fetch_edit_data['product_keywords'];
    $category_id = $fetch_edit_data['category_id'];
    $brand_id = $fetch_edit_data['brand_id'];
    $product_image = $fetch_edit_data['product_image1'];
    $product_image2 = $fetch_edit_data['product_image2'];
    $product_image3 = $fetch_edit_data['product_image3'];
    $product_price = $fetch_edit_data['product_price'];

    // fetching catgory name
    $select_category = "select * from `categories` where category_id = $category_id";
    $result_category = mysqli_query($conn, $select_category);
    $fetch_category = mysqli_fetch_assoc($result_category);
    $category_title = $fetch_category['category_title'];
    // echo $category_title;

    // fetching brand name
    $select_brand = "select * from `brands` where brand_id = $brand_id";
    $result_brand = mysqli_query($conn, $select_brand);
    $fetch_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $fetch_brand['brand_title'];
    // echo $brand_title;
}

?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <lable for="product_title" class="form-lable">Product Title</lable>
            <input type="text" name="product_title" class="form-control mb-4"
                required="required" autocomplete="off" value="<?php echo $product_title; ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <lable for="product_description" class="form-lable">Product Description</lable>
            <input type="text" name="product_description" class="form-control mb-4"
                required="required" autocomplete="off" value="<?php echo $product_description; ?>">
        </div>
        <div class="form-outline w-50 m-auto">
            <lable for="product_keywords" class="form-lable">Product KeyWords</lable>
            <input type="text" name="product_keywords" class="form-control mb-4"
                required="required" autocomplete="off" value="<?php echo $product_keywords; ?>">
        </div>
        <div class="form-outline w-50 m-auto">
            <lable for="product_category" class="form-lable">Product Categories</lable>
            <select name="product_category" class="form-control mb-4">
                <option value="<?php echo $category_title; ?>"><?php echo $category_title; ?></option>
                <?php
                $select_category_all = "select * from `categories`";
                $result_category_all = mysqli_query($conn, $select_category_all);
                while ($fetch_category_all = mysqli_fetch_assoc($result_category_all)) {
                    $category_id = $fetch_category_all['category_id'];
                    $category_title = $fetch_category_all['category_title'];
                    echo "<option value='$category_id'>$category_title</option>";
                };
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto">
            <lable for="product_brands" class="form-lable">Product Brands</lable>
            <select name="product_brands" class="form-control mb-4">
                <option value="<?php echo $brand_title; ?>"><?php echo $brand_title; ?></option>
                <?php
                $select_brands_all = "select * from `brands`";
                $result_brands_all = mysqli_query($conn, $select_brands_all);
                while ($fetch_brands_all = mysqli_fetch_assoc($result_brands_all)) {
                    $brand_id = $fetch_brands_all['brand_id'];
                    $brand_title = $fetch_brands_all['brand_title'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                };
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto">
            <lable for="product_image1" class="form-lable">Product Image 1</lable>
            <div class="d-flex">
                <input type="file" name="product_image1" class="w-90 m-auto form-control mb-4"
                    required="required" autocomplete="off">
                <img class="product_image1" src="../admin_area/product_images/<?php echo $product_image; ?>" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto">
            <lable for="product_image2" class="form-lable">Product Image 2</lable>
            <div class="d-flex">
                <input type="file" name="product_image2" class="w-90 m-auto form-control mb-4"
                    required="required" autocomplete="off">
                <img class="product_image1" src="../admin_area/product_images/<?php echo $product_image2; ?>" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto">
            <lable for="product_image3" class="form-lable">Product Image 3</lable>
            <div class="d-flex">
                <input type="file" name="product_image3" class="w-90 m-auto form-control mb-4"
                    required="required" autocomplete="off">
                <img class="product_image1" src="../admin_area/product_images/<?php echo $product_image3; ?>" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto">
            <lable for="product_price" class="form-lable">Product Price</lable>
            <input type="text" name="product_price" class="form-control mb-4"
                required="required" autocomplete="off" value="<?php echo $product_price; ?>">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update Product" class="btn bg-info py-2 px-3 border-0">
        </div>
    </form>
</div>

<?php
if (isset($_POST['edit_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image1']['name'];
    $product_image_tmp = $_FILES['product_image1']['tmp_name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image2_tmp = $_FILES['product_image2']['tmp_name'];
    $product_image3 = $_FILES['product_image3']['name'];
    $product_image3_tmp = $_FILES['product_image3']['tmp_name'];

    // checking if fields are empty or not

    if (
        $product_title == '' or $product_description == '' or $product_keywords == '' or $product_category == ''
        or $product_brands == '' or $product_price == '' or $product_image == '' or $product_image2 == ''
        or $product_image3 == ''
    ) {
        echo "<script>alert('please fill all fields')</script>";
        exit();
    } else {
        move_uploaded_file($product_image_tmp, "../admin_area/product_images/$product_image");
        move_uploaded_file($product_image2_tmp, "../admin_area/product_images/$product_image2");
        move_uploaded_file($product_image3_tmp, "../admin_area/product_images/$product_image3");

        // query to upadte products

        $update_products = "update `products` set product_title = '$product_title', 
        product_description = '$product_description', product_keywords = '$product_keywords',
        category_id = '$product_category', brand_id = '$product_brands', 
        product_image1 = '$product_image', product_image2 = '$product_image2',
        product_image3 = '$product_image3', product_price = '$product_price', date=NOW() where 
        product_id = $edit_id";
        $result_update_products = mysqli_query($conn, $update_products);
        if ($result_update_products) {
            echo "<script>alert('Product has been updated successfully')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }
}

?>