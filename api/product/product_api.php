<?php
class ProductApi
{

	public function __construct() {}

	function index()
	{
		echo json_encode(["product" => Product::all()]);
	}


	function find($data)
	{
		echo json_encode(["product" => Product::find($data["id"])]);
	}

	function delete($data)
	{
		Product::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}

	function save($data, $file = [])
	{
		$name= $data["name"];
		if (isset($file["photo"]["name"])) {
			$photo = upload($file["photo"], "../img", $data["name"]);
		} else {
			$photo = Product::find($data["id"])->photo;
		}
		$price= $data["price"];
		$offer_price= $data["offer_price"];
		$categorie_id= $data["categorie_id"];
		$uom_id= $data["uom_id"];
		$barcode= $data["barcode"];
		$sku= $data["sku"];
		$manufacturer_id= $data["manufacturer_id"];
		$star= $data["star"];
		$description= $data["description"];
		$weight= $data["weight"];
		$size= $data["size"];
		$is_feature= $data["is_feature"];
		$is_brand= $data["is_brand"];
	   
	   $product= new Product(null,$name,$price,$offer_price,$categorie_id,$uom_id,$barcode,$sku,$manufacturer_id,$star, $photo,$description,$weight,$size,$is_feature,$is_brand);
	   $result = $product->save();

		echo json_encode(["success" => "yes"]);
	}
	function update($data, $file = [])
	{
		$id= $data["id"];
		$name= $data["name"];
		if (isset($file["photo"]["name"])) {
			$photo = upload($file["photo"], "../img", $data["name"]);
		} else {
			$photo = Product::find($data["id"])->photo;
		}
		$price= $data["price"];
		$offer_price= $data["offer_price"];
		$categorie_id= $data["categorie_id"];
		$uom_id= $data["uom_id"];
		$barcode= $data["barcode"];
		$sku= $data["sku"];
		$manufacturer_id= $data["manufacturer_id"];
		$star= $data["star"];
		$description= $data["description"];
		$weight= $data["weight"];
		$size= $data["size"];
		$is_feature= $data["is_feature"];
		$is_brand= $data["is_brand"];
		
		$product= new Product($id, $name, $price, $offer_price, $categorie_id, $uom_id,$barcode, $sku, $manufacturer_id, $star, $photo, $description, $weight, $size,$is_feature, $is_brand);
		
		$result = $product->update();

		echo json_encode(["success" => "yes"]);
	}
}
