<?php
class ProcessApi
{

	function save($data)
	{

 	 	//print_r($data);

		  $data= $data;

		  $date= date ("Y-m-d", strtotime($data["date"]));
		  $delivery_date= date ("Y-m-d", strtotime($data["delivery_date"]));

		$supplier_id = $data["supplier_id"];
		$status_id =2;     //$data["status_id"];
		$order_total = $data["order_total"];
		$paid_amount = 0;    //$data["paid_amount"];
		$discount = $data["discount"];
		$vat = $data["vat"];
		$shipping_address = $data["shipping_address"] ?? "";
		$description = $data["remark"] ?? "";

		$purchases= new Purchases(null, $supplier_id,"", $status_id, $order_total, $paid_amount, $discount, $vat, $delivery_date, $date, $shipping_address, $description);

		 $purchases_last_id = $purchases->save();

		$products = $data["products"];
		$warehouse_id = $data["warehouse_id"];

		foreach ($products as $value) {
			$purchases_id =  $purchases_last_id ;
			$product_id = $value["item_id"];
			$qty = $value["qty"] ;
			$price = $value["price"];
			$vat = "";  //$value["vat"];
			$discount = $value["discount"];

			$purchases_details = new Purchases_details(null, $purchases_id, $product_id, $qty, $price, $vat, $discount);

			$result = $purchases_details->save();


			$transaction_type_id = 3;     //$data["transaction_type_id"];
			$warehouse_id = $warehouse_id ;
			$remark ="" ;   //$data["remark"];

			$result = new Stock(null, $product_id, $transaction_type_id, $warehouse_id, $qty, $remark);
			$result->save();
		}
		echo json_encode(["success" => "yes"]);
	}
}
