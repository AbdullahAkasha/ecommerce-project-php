<?php

// include connection file
// include('./includes/connect.php');

// Getting Products
function getProducts()
{
  global $conn;

  // condition to check isset or not
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {

      $select_query = "select * from `products`order by rand() LIMIT 0,3";
      $result_query = mysqli_query($conn, $select_query);
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";
      }
    }
  }
}

// displaying all products on all products page
function get_all_Products()
{
  global $conn;

  // condition to check isset or not
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {

      $select_query = "select * from `products`order by rand()";
      $result_query = mysqli_query($conn, $select_query);
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";
      }
    }
  }
}

// Getting unique categories from URL

function get_unique_categories()
{
  global $conn;
  if (isset($_GET['category'])) {
    $category_id = $_GET['category'];

    $select_query = "select * from `products` where category_id=$category_id";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_row = mysqli_num_rows($result_query);
    if ($num_of_row == 0) {
      echo "<h2 class='text-center text-danger ml-5'>No Category Found</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];

      echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";
    }
  }
}

// geeting unique brands from URL

function get_unique_brands()
{
  global $conn;
  if (isset($_GET['brand'])) {
    $brand_id = $_GET['brand'];

    $select_query = "select * from `products` where brand_id=$brand_id";
    $result_query = mysqli_query(
      $conn,
      $select_query
    );
    $num_of_row = mysqli_num_rows($result_query);
    if ($num_of_row == 0) {
      echo "<h2 class='text-center text-danger ml-5'>No Brand Found</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];

      echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";
    }
  }
}


// function for displaying brands in sidebar on homepage
function getBrands()
{
  global $conn;
  $select_brands = "select * from brands";
  $run_brands = mysqli_query($conn, $select_brands);
  while ($row_brands = mysqli_fetch_array($run_brands)) {
    $brand_title = $row_brands['brand_title'];
    $brand_id = $row_brands['brand_id'];
    echo "
            <li class='nav-item'>
          <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        </li>
            ";
  }
}

// function for displaying categories in sidebar on homepage

function getCategories()
{

  global $conn;
  $category_query = "select * from categories";
  $run_query = mysqli_query($conn, $category_query);
  while ($row = mysqli_fetch_array($run_query)) {
    $category_title = $row['category_title'];
    $category_id = $row['category_id'];
    echo "
            <li class='nav-item'>
          <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        </li>
            ";
  }
}

// function for searching products
function get_search_products()
{
  global $conn;
  if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data'];
    $search_query = "select * from `products` where product_keywords like
  '$search_data_value%'";
    $result_query = mysqli_query($conn, $search_query);
    $num_of_row = mysqli_num_rows($result_query);
    if ($num_of_row == 0) {
      echo "<h2 class='text-center text-danger ml-5'>No Product Found</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];

      echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";
    }
  }
}
//  View details button function

function viewDetails()
{
  global $conn;
  // condition to check isset or not
  if (isset($_GET['product_id'])) {
    if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) {
        $product_id = $_GET['product_id'];
        $select_query = "select * from `products` where product_id = $product_id";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image = $row['product_image1'];
          $product_image2 = $row['product_image2'];
          $product_image3 = $row['product_image3'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];

          echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>
          <div class='col-md-8'>
                    <!-- Relaed images -->
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4 class='text-center mb-5'>Related Images</h4>
                        </div>
                        <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image2' class='view-more-image card-img-top' alt='$product_title'>
                        </div>
                        <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image3' class='view-more-image card-img-top' alt='$product_title'>
                        </div>
                    </div>
                </div>";
        }
      }
    }
  }
}

// getting ip address function

function getIPAddress()
{
  //whether ip is from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address  
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

// cart function

function cart()
{
  if (isset($_GET['add_to_cart'])) {
    global $conn;
    $ip = getIPAddress();
    $product_id = $_GET['add_to_cart'];
    $select_query = "select * from `cart_details` where ip_address = '$ip' and
  product_id = $product_id";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows > 0) {
      echo "<script>alert('Item Already Added To Cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    } else {
      $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values
      ($product_id,'$ip',0)";
      $result = mysqli_query($conn, $insert_query);
      echo "<script>alert('Item Added To Cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}

// function for cart numbers

function cart_item()
{
  if (isset($_GET['add_to_cart'])) {
    global $conn;
    $ip = getIPAddress();
    $select_query = "select * from `cart_details` where ip_address = '$ip'";
    $result_query = mysqli_query($conn, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  } else {
    global $conn;
    $ip = getIPAddress();
    $select_query = "select * from `cart_details` where ip_address = '$ip'";
    $result_query = mysqli_query($conn, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  }
  echo $count_cart_items;
}

// total cart price function

function total_cart_price()
{
  $total = 0;
  global $conn;
  $ip = getIPAddress();
  $select_query = "select * from `cart_details` where ip_address = '$ip'";
  $result_query = mysqli_query($conn, $select_query);
  while ($row = mysqli_fetch_array($result_query)) {
    $product_id = $row['product_id'];
    $select_products = "select * from `products` where product_id = '$product_id'";
    $result_products = mysqli_query($conn, $select_products);
    while ($product_price = mysqli_fetch_array($result_products)) {
      $product_price = array($product_price['product_price']);
      $product_values = array_sum($product_price);
      $total += $product_values;
    }
  }
  echo $total;
}

// function to remove items from cart

function remove_item()
{
  global $conn;
  if (isset($_POST['remove_item'])) {
    foreach ($_POST['removeitem'] as $remove_id) {
      $delete_query = "delete from `cart_details` where product_id = $remove_id";
      $run_delete = mysqli_query($conn, $delete_query);
      if ($run_delete) {
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}

// Getting user pending order details

function user_pending_order()
{
  global $conn;
  $username = $_SESSION['user_name'];
  $ip = getIPAddress();
  $get_pending_order = "select * from `user_table` where user_name = '$username'";
  $result_pending_order = mysqli_query($conn, $get_pending_order);
  while ($row_pending_order = mysqli_fetch_array($result_pending_order)) {
    $user_id = $row_pending_order['user_id'];
    if (!isset($_GET['edit_account'])) {
      if (!isset($_GET['my_orders'])) {
        if (!isset($_GET['delete_account'])) {
          $get_all_oders = "select * from `user_orders` where user_id = $user_id and order_status = 'pending'";
          $result_all_orders = mysqli_query($conn, $get_all_oders);
          $row_count = mysqli_num_rows($result_all_orders);
          if ($row_count > 0) {
            echo "<h3 class='text-center mt-5'>You Have <span class='mb-3 badge badge-danger'>$row_count</span> Pending Orders</span></3>
            <div class='text-center mb-3'><a href='profile.php?my_orders' class='btn btn-primary'>View Orders</a></div>";
          } else {
            echo "<h3 class='text-center mt-5'>You Have <span class='mb-3 badge badge-success'>0</span> Pending Orders</span></3>
            <div class='text-center mb-3'><a href='../index.php' class='btn btn-primary'>Explore Products</a></div>";
          }
        }
        // $get_pending_order_items = "select * from `cart_details` where user_id = '$user_id' and ip_address = '$ip'";
        // $result_pending_order_items = mysqli_query($conn, $get_pending_order_items);
        // $row_count = mysqli_num_rows($result_pending_order_items);
        // echo $row_count;
      }
    }
  }
}
