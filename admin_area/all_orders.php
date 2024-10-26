<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered table-dark text-center">
    <thead>
        <?php
        $get_orders = "select * from `user_orders`";
        $result_orders = mysqli_query($conn, $get_orders);
        $row_orders = mysqli_num_rows($result_orders);
        if ($row_orders > 0) {
            echo "<tr>
            <th scope='col'>Sr No</th>
            <th scope='col'>Due Amount</th>
            <th scope='col'>Invoice Number</th>
            <th scope='col'>Total Products</th>
            <th scope='col'>Order Date</th>
            <th scope='col'>Status</th>
            <th scope='col'>Delete</th>
        </tr>";
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $order_status = $row_orders['order_status'];
                echo "<tr>";
                echo "<td>" . $row_orders['order_id'] . "</td>";
                echo "<td>" . $row_orders['amount_due'] . "</td>";
                echo "<td>" . $row_orders['invoice_number'] . "</td>";
                echo "<td>" . $row_orders['total_products'] . "</td>";
                echo "<td>" . $row_orders['order_date'] . "</td>";
                echo "<td>" . $order_status . "</td>";
                echo "<td><a href='index.php?delete_order=" . $row_orders['order_id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<h3 class='bg-danger text-center mt-5'>No Orders Yet</h3>";
        }

        ?>
    </thead>
    <tbody>
    </tbody>
</table>