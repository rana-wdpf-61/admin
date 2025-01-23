<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Purchase Report  </h3><br>
   <form action="" method="post">
   <label for="">Start Date :</label>
    <input type="date" name="startDate">
    <label for="">End Date :</label>
    <input type="date" name="endDate">
    <button type="submit" name="startDate">Show Report</button>
   </form>
   <hr>
</body>
</html>

<?php

$uPrice = 0;
$qty = 0;
$totalPrice = 0;

if(isset($_POST['startDate']) && isset($_POST['endDate'])){
    $startDate = htmlentities($_POST['startDate']);
    $endDate = htmlentities($_POST['endDate']);
    
    // Prepare the SQL query to filter by startDate and endDate
    $saleFilteredReportSql = 'SELECT * FROM core_orders WHERE date(created_at) BETWEEN :startDate AND :endDate';
    $saleFilteredReportStatement = $data->prepare($saleFilteredReportSql);
    
    // Execute the query with parameters
    $saleFilteredReportStatement->execute(['startDate' => $startDate, 'endDate' => $endDate]);

    // Initialize the output for the table
    $output = '<table id="saleFilteredReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Customer Name</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        <th>Discount</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                        <th>Delivery Date</th>
                    </tr>
                </thead>
                <tbody>';

    // Loop through the rows from the query result
    while($row = $saleFilteredReportStatement->fetch()){
        $uPrice = $row['unit_price'];
        $qty = $row['qty'];
        $discount = $row['discount'];

        // Calculate total price after discount
        $totalPrice = $uPrice * $qty * ((100 - $discount) / 100);
    
        // Output the row with the calculated total price
        $output .= '<tr>' .
                    '<td>' . $row['id'] . '</td>' .
                    '<td>' . $row['customer_id'] . '</td>' .
                    '<td>' . $row['unit_price'] . '</td>' .
                    '<td>' . number_format($totalPrice, 2) . '</td>' .
                    '<td>' . $row['discount'] . '%</td>' .
                    '<td>' . $row['qty'] . '</td>' .
                    '<td>' . $row['order_date'] . '</td>' .
                    '<td>' . $row['delivery_date'] . '</td>' .
                    '</tr>';
    }

    // Close the statement
    $saleFilteredReportStatement->closeCursor();

    // Close the table and provide a footer if necessary
    $output .= '</tbody>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        <th colspan="7" style="text-align: right;">' . number_format($totalPrice, 2) . '</th>
                    </tr>
                </tfoot>
            </table>';
    
    // Display the table
    echo $output;
}

?>