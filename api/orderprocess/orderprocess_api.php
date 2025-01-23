<?php
class OrderprocessApi
{

	function save($data)
	{

 	 	print_r($data);

		$data= $data;
        $order_date=date("Y-m-d",strtotime($data["order_date"]));
        $delivery_date=date("Y-m-d",strtotime($data["delivery_date"]));

       
        $customars_id=$data["customar_id"];
        $order_total=$data["order_total"];
        $discount=$data["Order_discount"];
        $shipping_address=$data["shipping_address"];
        $paid_amount=$data["order_total"];       //$data["paid_amount"];
        $status_id= 1;     //$data["status_id"];
        
        $vat= isset($data["vat"]) ?? 0;
        $uom_id=1;     //$data["uom_id"];

        $order = new Order(null, $customars_id, $order_total, $discount, $shipping_address, $paid_amount, $status_id, $order_date, $delivery_date, $vat, $uom_id);

        $order_last_id = $order->save();

		$products = $data["products"];
        $warehouse_id = isset($data["warehouse_id"]) ?? 1 ;
		foreach ($products as $value) {
            $order_id= $order_last_id;
            $product_id=$value["item_id"];
            $qty=$value["qty"];
            $price=$value["price"];
            $unit_price=$value["subtotaltwo"];
            $discount=$value["discount"];
            $vat= isset( $value["vat"]) ?? 0;
            $uom_id= isset($value["uom_id"])??0;

            $result = new Order_details(null, $order_id, $product_id, $qty, $price,$unit_price,$discount, $vat, $uom_id);
            $result->save();

			$transaction_type_id = 3;     //$data["transaction_type_id"];
			$warehouse_id =	$warehouse_id ;
			$remark ="" ;   //$data["remark"];
            $qty=$value["qty"] * -1;
			$result = new Stock(null, $product_id, $transaction_type_id, $warehouse_id, $qty, $remark);
			$result->save();
		}
		echo json_encode(["success" => "yes"]);
	}
}
