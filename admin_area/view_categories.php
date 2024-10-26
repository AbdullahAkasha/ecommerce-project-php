<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered text-center table-dark mt-5">
    <thead>
        <tr>
            <th scope="col">S No</th>
            <th scope="col">Category Title</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_query = "select * from `categories`";
        $result_query = mysqli_query($conn, $select_query);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result_query)) {
            $category_title = $row['category_title'];
            $category_id = $row['category_id'];
            $number++;
        ?>
            <td><?php echo $number ?></td>
            <td><?php echo $category_title ?></td>
            <td><button class='btn btn-info'><a class='text-light' href='index.php?edit_category=<?php echo $category_id ?>'>
                        Edit</a></button></td>
            <td><button class='btn btn-danger'><a class='text-light' href='index.php?delete_category=<?php echo $category_id ?>'>
                        Delete</a></button></td>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>