<!-- <?php

//print_r($supplier);

?>



<div class="col-md-12 col-lg-12 table-responsive view-table">
    <table class="table">
        <tbody>
            <tr>
                <td><strong>Purchased Code:</strong>
                    PP-21
                </td>
            </tr>
            <tr>
                <td><strong>Supplier:</strong>
                    SHAKIL
                </td>
            </tr>
            <tr>
                <td><strong>Purchase Products:</strong>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Purchased Qty</th>
                                    <th>Used</th>
                                    <th>Return</th>
                                    <th>Damage</th>
                                    <th>Available</th>
                                    <th>Unit Price</th>
                                    <th>Discount</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>crush</td>
                                    <td>10.00 Pieces
                                    </td>
                                    <td>2.00 Pieces
                                    </td>
                                    <td>0 Pieces</td>
                                    <td>0 Pieces</td>
                                    <td>8
                                        Pieces</td>
                                    <td>RS800.00
                                    </td>
                                    <td>RS0
                                        (0%)
                                    </td>
                                    <td class="text-right">

                                        RS8000.00
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td><strong>Subtotal:</strong>
                    RS8000.00
                    (After reducing discount.)
                </td>
            </tr>
            <tr>
                <td><strong>Total Discount:</strong>
                    RS0
                </td>
            </tr>
            <tr>
                <td><strong>Trasnport Cost:</strong>
                    +RS0
                </td>
            </tr>
            <tr>
                <td><strong>Grand Total:</strong>
                    RS8000.00
                </td>
            </tr>
            <tr>
                <td><strong>Total Paid:</strong>
                    RS8000.00
                </td>
            </tr>
            <tr>
                <td><strong>Total Due:</strong>
                    RS0
                </td>
            </tr>
            <tr>
                <td><strong>Payment Method:</strong>
                    Bank Transfer
                </td>
            </tr>
            <tr>
                <td><strong>Note:</strong></td>
            </tr>
            <tr>
                <td><strong>Status:</strong> <span class="badge badge-success">Active</span></td>
            </tr>
        </tbody>
    </table>
</div>


<button  class="btn btn-secondary float-right print-btn" onclick="print()"><i class="bi bi-printer-fill"></i>  Print</button> -->


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
		while($row = $saleFilteredReportStatement->fetch(PDO::FETCH_ASSOC)){
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








