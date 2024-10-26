<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered table-dark text-center">
    <thead>
        <?php
        $get_payment = "select * from `all_payments`";
        $result_orders = mysqli_query($conn, $get_payment);
        $row_orders = mysqli_num_rows($result_orders);
        if ($row_orders > 0) {
            echo "<tr>
            <th scope='col'>Sr No</th>
            <th scope='col'>Invoice Number</th>
            <th scope='col'>Amount Received</th>
            <th scope='col'>Payment Mode</th>
            <th scope='col'>Order Date</th>
            <th scope='col'>Delete</th>
        </tr>";
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                echo "<tr>";
                echo "<td>" . $row_orders['order_id'] . "</td>";
                echo "<td>" . $row_orders['invoice_number'] . "</td>";
                echo "<td>" . $row_orders['amount'] . "</td>";
                echo "<td>" . $row_orders['payment_mode'] . "</td>";
                echo "<td>" . $row_orders['date'] . "</td>";
                echo "<td><a href='index.php?delete_order=" . $row_orders['order_id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<h3 class='bg-danger text-center mt-5'>No Payments Yet</h3>";
        }

        ?>
    </thead>
    <tbody>
    </tbody>
</table>