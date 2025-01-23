<?php
class Order_detailsApi
{

  public function __construct() {}


  function index()
  {
    echo json_encode(["order_details" => Order_details::all()]);
  }


  function find($data)
  {
    echo json_encode(["order_details" => Order_details::find($data["id"])]);
  }


  function delete($data)
  {
    Order_details::delete($data["id"]);
    echo json_encode(["success" => "yes"]);
  }


  static function save($data, $file = [])
  {
    $order_id=$data["order_id"];
    $product_id=$data["product_id"];
    $qty=$data["qty"];
    $price=$data["price"];
    $vat=$data["vat"];
    $uom_id=$data["uom_id"];

    $result = new Order_details(null, $order_id, $product_id, $qty, $price, $vat, $uom_id);
    $result->save();
  }


  function update($data, $file = [])
  {
    $id=$data["id"];
    $order_id=$data["order_id"];
    $product_id=$data["product_id"];
    $qty=$data["qty"];
    $price=$data["price"];
    $vat=$data["vat"];
    $uom_id=$data["uom_id"];

    $result = new Order_details($id, $order_id, $product_id, $qty, $price, $vat, $uom_id);
    $result->update();
  }
  
}
