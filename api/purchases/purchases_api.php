<?php
class PurchasesApi{

	public function __construct(){
	}

  function index(){
		echo json_encode(["purchases"=>Purchases::all()]);
	}

  function find($data){
		echo json_encode(["purchases"=>Purchases::find($data["id"])]);
	}
	function delete($data){
		Purchases::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}

  static function save($data,$file=[]){  
    $suppliers_id=$data["suppliers_id"];
    $products_id=$data["products_id"];
    $status_id=$data["status_id"];
    $order_total=$data["order_total"];
    $paid_amount=$data["paid_amount"];
    $discount=$data["discount"];
    $vat=$data["vat"];
    $delivery_date=$data["delivery_date"];
    $date=$data["date"];
    $shipping_address=$data["shipping_address"];
    $description=$data["description"];
    
    $purchases=new Purchases("", $suppliers_id, $products_id, $status_id, $order_total, $paid_amount, $discount, $vat, $delivery_date, $date, $shipping_address, $description);  
    $purchases_id=$purchases->save();  
    echo json_encode(["success" => "yes"]);
  }

  
  function update($data,$file=[]){
  $id=$data["id"];
  $suppliers_id=$data["suppliers_id"];
  $products_id=$data["products_id"];
  $status_id=$data["status_id"];
  $order_total=$data["order_total"];
  $paid_amount=$data["paid_amount"];
  $discount=$data["discount"];
  $vat=$data["vat"];
  $delivery_date=$data["delivery_date"];
  $date=$data["date"];
  $shipping_address=$data["shipping_address"];
  $description=$data["description"];

  $purchases = new Purchases($id, $suppliers_id, $products_id, $status_id, $order_total, $paid_amount, $discount, $vat, $delivery_date, $date, $shipping_address, $description);

  $purchases->update();

    
    }

  }

  ?>
   

    

