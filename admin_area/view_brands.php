<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered text-center table-dark mt-5">
    <thead>
        <tr>
            <th scope="col">S No</th>
            <th scope="col">Brand Title</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_query = "select * from `brands`";
        $result_query = mysqli_query($conn, $select_query);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result_query)) {
            $brand_title = $row['brand_title'];
            $brand_id = $row['brand_id'];
            $number++;
        ?>
            <td><?php echo $number ?></td>
            <td><?php echo $brand_title ?></td>
            <td><button class='btn btn-info'><a class='text-light' href='index.php?edit_brand=<?php echo $brand_id ?>'>Edit</a></button></td>
            <td><button class='btn btn-danger'><a class='text-light' href='index.php?delete_brand=<?php echo $brand_id ?>'>Delete</a></button></td>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>