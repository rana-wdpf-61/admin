
<?php
$uPrice = 0;
	$qty = 0;
	$totalPrice = 0;
	
	if(isset($_POST['startDate'])){
		$startDate = htmlentities($_POST['startDate']);
		$endDate = htmlentities($_POST['endDate']);
		
		$saleFilteredReportSql = 'SELECT * FROM core_orders WHERE saleDate BETWEEN :startDate AND :endDate';
		$saleFilteredReportStatement = $conn->prepare($saleFilteredReportSql);
		$saleFilteredReportStatement->execute(['startDate' => $startDate, 'endDate' => $endDate]);

		$output = '<table id="saleFilteredReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
					<thead>
						<tr>
						        <th>Id</th>
                    <th>Customar Name</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th>Order_date</th>
                    <th>Delivery_date</th>
						</tr>
					</thead>
					<tbody>';
		
		// Create table rows from the selected data
		while($row = $saleFilteredReportStatement->fetch(Order_details::find_all(MYSQLI_ASSOC))){
			$uPrice = $row['unitPrice'];
			$qty = $row['quantity'];
			$discount = $row['discount'];
			$totalPrice = $uPrice * $qty * ((100 - $discount)/100);
		
			$output .= '<tr>' .
							'<td>' . $row['id'] . '</td>' .
							'<td>' . $row['customar_id'] . '</td>' .
							'<td>' . $row['unit_price'] . '</td>' .
							'<td>' . $row['price'] . '</td>' .
							'<td>' . $row['discount'] . '</td>' .
							'<td>' . $row['qty'] . '</td>' .
							'<td>' . $row['order_date'] . '</td>' .
							'<td>' . $row['delivery_date'] . '</td>' .
							'<td>' . $totalPrice . '</td>' .
						'</tr>';
		}
		
		$saleFilteredReportStatement->closeCursor();
		
		$output .= '</tbody>
						<tfoot>
							<tr>
								<th>Total</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</tfoot>
					</table>';
		echo $output;
	}
?>








