<?php
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <!-- Product Title -->
    <div class="container mt-3">
        <h1 class="text-center ">Insert Products</h1>
        <!-- Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-lable">Product Title</label>
                <input type="text" autocomplete="off" required name="product_title" id="product_title" class="form-control" placeholder="Enter product title">
            </div>
            <!-- Product Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-lable">Product Description</label>
                <input type="text" autocomplete="off" required name="product_description" id="product_description" class="form-control" placeholder="Enter product description">
            </div>
            <!-- Product Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-lable">Product keywords</label>
                <input type="text" autocomplete="off" required name="product_keywords" id="product_keywords" class="form-control mb-4" placeholder="Enter product keywords">
            </div>
            <!-- Product Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="product_category" class="form-control mb-4">
                    <option value="">Select Category</option>
                    <?php
                    $select_query = "SELECT * FROM `categories`";
                    $result_query = mysqli_query($conn, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                    <!-- <option value="">Category 1</option>
                    <option value="">Category 2</option>
                    <option value="">Category 3</option>
                    <option value="">Category 4</option>
                    <option value="">Category 5</option> -->
                </select>
            </div>
            <!-- Product Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="product_brand" class="form-control">
                    <option value="">Select Brand</option>
                    <?php
                    $select_query = "SELECT * FROM `brands`";
                    $result_query = mysqli_query($conn, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                    <!-- // <option value="">Brand 1</option>
                    // <option value="">Brand 2</option>
                    // <option value="">Brand 3</option>
                    // <option value="">Brand 4</option> -->
                </select>
            </div>

            <!-- Product images 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-lable">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control mb-4">
            </div>

            <!-- Product images 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-lable">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control mb-4">
            </div>

            <!-- Product images 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-lable">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control mb-4">
            </div>
            <!-- Product price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-lable">Product Price</label>
                <input type="number" name="product_price" id="product_price" class="form-control mb-4" placeholder="Enter product price">
            </div>
            <!-- Product submit button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" value="Insert Product" name="insert_product" class="form-control mb-4 bg-info text-light btn-info btn">
            </div>
        </form>
    </div>

</body>

</html>

<?php
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    // accessing image
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    // accessing image tmp name
    $tmp_image1 = $_FILES['product_image1']['tmp_name'];
    $tmp_image2 = $_FILES['product_image2']['tmp_name'];
    $tmp_image3 = $_FILES['product_image3']['tmp_name'];

    // check empty contion
    if (
        $product_title == '' or $product_description == '' or $product_keywords == '' or $product_category == '' or $product_brand == '' or $product_price == ''
        or $product_image1 == '' or $product_image2 == '' or $product_image3 == ''
    ) {
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    } else {
        move_uploaded_file($tmp_image1, "./product_images/$product_image1");
        move_uploaded_file($tmp_image2, "./product_images/$product_image2");
        move_uploaded_file($tmp_image3, "./product_images/$product_image3");

        // insert query
        $insert_products = "INSERT INTO `products` (product_title, product_description, product_keywords,
         category_id, brand_id, product_image1, product_image2, product_image3, product_price , date, status) 
        VALUES ('$product_title', '$product_description', '$product_keywords', '$product_category',
         '$product_brand', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(),
          '$product_status')";
        $result = mysqli_query($conn, $insert_products);
        if ($result) {
            echo "<script>alert('Product Inserted Successfully')</script>";
            // echo "<script>window.open('insert_products.php','_self')</script>";
        }
    }
}
?>