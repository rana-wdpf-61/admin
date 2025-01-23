<?php
class OrderApi
{

  public function __construct() {}

  function index()
  {
    echo json_encode(["order" => Order::all()]);
  }

  function find($data)
  {
    echo json_encode(["order" => Order::find($data["id"])]);
  }
  function delete($data)
  {
    Purchases::delete($data["id"]);
    echo json_encode(["success" => "yes"]);
  }

  static function save($data, $file = [])
  {
    $customars_id = $data["customars_id"];
    $order_total = $data["order_total"];
    $discount = $data["discount"];
    $shipping_address = $data["shipping_address"];
    $paid_amount = $data["paid_amount"];
    $status_id = $data["status_id"];
    $order_date = $data["order_date"];
    $delivery_date = $data["delivery_date"];
    $vat = $data["vat"];
    $uom_id = $data["uom_id"];

    $result = new Order(null, $customars_id, $order_total, $discount, $shipping_address, $paid_amount, $status_id, $order_date, $delivery_date, $vat, $uom_id);

    $result->save();
    echo json_encode(["success" => "yes"]);
  }


  function update($data, $file = [])
  {
    $id=$data["id"];
    $customars_id=$data["customars_id"];
    $order_total=$data["order_total"];
    $discount=$data["discount"];
    $shipping_address=$data["shipping_address"];
    $paid_amount=$data["paid_amount"];
    $status_id=$data["status_id"];
    $order_date=$data["order_date"];
    $delivery_date=$data["delivery_date"];
    $vat=$data["vat"];
    $uom_id=$data["uom_id"];

    $result = new Order($id, $customars_id, $order_total, $discount, $shipping_address, $paid_amount, $status_id, $order_date, $delivery_date, $vat, $uom_id);

    $result->update();
  }
}
