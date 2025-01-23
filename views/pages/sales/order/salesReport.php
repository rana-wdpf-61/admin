<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Sales Report  </h3><br>
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
// $uPrice = 0;
// $qty = 0;
// $totalPrice = 0;
// if(isset($_POST['startDate'])){
//     $startDate = htmlentities($_POST['startDate']);
//     $endDate = htmlentities($_POST['endDate']);
    
//     $saleFilteredReportSql = 'SELECT * FROM core_orders where core_orders.id';
//     $saleFilteredReportStatement = $data->prepare($saleFilteredReportSql);
//     $saleFilteredReportStatement->execute(['startDate' => $startDate, 'endDate' => $endDate]);

//     $output = '<table id="saleFilteredReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
//                 <thead>
//                 <tr>
//                 <th>Id</th>
//                 <th>Customar Name</th>
//                 <th>Unit Price</th>
//                 <th>Total Price</th>
//                 <th>Discount</th>
//                 <th>Quantity</th>
//                 <th>Order_date</th>
//                 <th>Delivery_date</th>
//                 </tr>
//                 </thead>
//                 <tbody>';
    
//     // Create table rows from the selected data
//     while($row = $saleFilteredReportStatement->fetch(Order_details::find_all($id))){
//         $uPrice = $row['unit_price'];
//         $qty = $row['qty'];
//         $discount = $row['discount'];
//         $totalPrice = $uPrice * $qty * ((100 - $discount)/100);
    
//         $output .= '<tr>' .
//                         '<td>' . $row['id'] . '</td>' .
//                         '<td>' . $row['customar_id'] . '</td>' .
//                         '<td>' . $row['unit_price'] . '</td>' .
//                         '<td>' . $row['price'] . '</td>' .
//                         '<td>' . $row['discount'] . '</td>' .
//                         '<td>' . $row['qty'] . '</td>' .
//                         '<td>' . $row['order_date'] . '</td>' .
//                         '<td>' . $row['delivery_date'] . '</td>' .
//                         '<td>' . $totalPrice . '</td>' .
//                     '</tr>';
//     }
    
//     $saleFilteredReportStatement->closeCursor();
    
//     $output .= '</tbody>
//                     <tfoot>
//                         <tr>
//                             <th>Total</th>
//                             <th></th>
//                             <th></th>
//                             <th></th>
//                             <th></th>
//                             <th></th>
//                             <th></th>
//                             <th></th>
//                             <th></th>
//                             <th></th>
//                         </tr>
//                     </tfoot>
//                 </table>';
//     echo $output;
// }



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
    $html = '<table id="saleFilteredReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
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
        $html .= '<tr>' .
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
    $html .= '</tbody>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        <th colspan="7" style="text-align: right;">' . number_format($totalPrice, 2) . '</th>
                    </tr>
                </tfoot>
            </table>';
    
    // Display the table
    echo $html;
}

?>


