<?php
class Purchases_detailsApi
{

  public function __construct() {}

  function index()
  {
    echo json_encode(["purchases_details" => Purchases_details::all()]);
  }

  function find($data)
  {
    echo json_encode(["purchases_details" => Purchases_details::find($data["id"])]);
  }
  function delete($data)
  {
    Purchases_details::delete($data["id"]);
    echo json_encode(["success" => "yes"]);
  }

  static function save($data, $file = [])
  {
    $purchases_id = $data["purchases_id"];
    $product_id = $data["product_id"];
    $qty = $data["qty"];
    $price = $data["price"];
    $vat = $data["vat"];
    $discount = $data["discount"];

    $purchases_details = new Purchases_details(null, $purchases_id, $product_id, $qty, $price, $vat, $discount);

    $result = $purchases_details->save();
    echo json_encode(["success" => "yes"]);
  }


  function update($data, $file = [])
  {
    $id = $data["id"];
    $purchases_id = $data["purchases_id"];
    $product_id = $data["product_id"];
    $qty = $data["qty"];
    $price = $data["price"];
    $vat = $data["vat"];
    $discount = $data["discount"];

    $purchases_details = new Purchases_details($id, $purchases_id, $product_id, $qty, $price, $vat, $discount);

    $result = $purchases_details->update();
  }
}
