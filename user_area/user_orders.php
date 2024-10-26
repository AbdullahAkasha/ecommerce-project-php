<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>

<body>
    <?php
    $username = $_SESSION['user_name'];
    $select_query = "Select * from `user_table` where user_name = '$username'";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];
    // echo $user_id;
    ?>
    <h3 class="text-center text-success"> All Orders</h3>
    <table class="table table-border mt-4">
        <thead class="bg-dark text-white">
            <tr>
                <th>Sr No</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-white">
            <?php
            $get_order_table = "Select * from `user_orders` where user_id = $user_id";
            $result_order_table = mysqli_query($conn, $get_order_table);
            $number = 0;
            while ($row_order_table = mysqli_fetch_assoc($result_order_table)) {
                $order_id = $row_order_table['order_id'];
                $amount_due = $row_order_table['amount_due'];
                $total_products = $row_order_table['total_products'];
                $invoice_number = $row_order_table['invoice_number'];
                $order_date = $row_order_table['order_date'];
                $order_status = $row_order_table['order_status'];
                if ($order_status == 'pending') {
                    $order_status = 'Incomplete';
                } else {
                    $order_status = 'Complete';
                }
                $number++;
                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>";
            ?>
            <?php
                if ($order_status == 'Complete') {
                    echo "<td>Paid</td>";
                } else {
                    echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</td>
            </tr>";
                }
            }
            ?>
            <!-- <tr>
                <td>1</td>
                <td>111</td>
                <td>3</td>
                <td>786876</td>
                <td>2-10-2024</td>
                <td>Completed</td>
                <td>Confirmed</td>
            </tr> -->
        </tbody>
    </table>
</body>

</html>