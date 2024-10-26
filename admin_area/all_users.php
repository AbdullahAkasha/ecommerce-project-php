<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered table-dark text-center">
    <thead>
        <?php
        $get_payment = "select * from `user_table`";
        $result_orders = mysqli_query($conn, $get_payment);
        $row_orders = mysqli_num_rows($result_orders);
        if ($row_orders > 0) {
            echo "<tr>
            <th scope='col'>Sr No</th>
            <th scope='col'>User Name</th>
            <th scope='col'>User Email</th>
            <th scope='col'>User Address</th>
            <th scope=''col>User Mobile</th>
            <th scope='col'>Delete</th>
        </tr>";
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                echo "<tr>";
                echo "<td>" . $row_orders['user_id'] . "</td>";
                echo "<td>" . $row_orders['user_name'] . "</td>";
                echo "<td>" . $row_orders['user_email'] . "</td>";
                echo "<td>" . $row_orders['user_address'] . "</td>";
                echo "<td>" . $row_orders['user_mobile'] . "</td>";
                echo "<td><a href='index.php?delete_user=" . $row_orders['user_id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<h3 class='bg-danger text-center mt-5'>No Users Yet</h3>";
        }

        ?>
    </thead>
    <tbody>
    </tbody>
</table>