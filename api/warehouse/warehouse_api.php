<?php
class WarehouseApi{
	public function __construct(){
	}

	function index(){
		echo json_encode(["warehouse"=>Warehouse::all()]);
	}

	function find($data){
		echo json_encode(["warehouse"=>Warehouse::find($data["id"])]);
	}
	function delete($data){
		Supplier::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}

	function save($data,$file=[]){
		$name = $data["name"];
		$phone = $data["phone"];
		$location = $data["location"];
		$address = $data["address"];
		$warehouse = new Warehouse(null, $name, $phone, $location, $address);
		$result = $warehouse->save();
		echo json_encode(["success" => "yes"]);
	}

	function update($data,$file=[]){
		$id = $data["id"];
		$name = $data["name"];
		$phone = $data["phone"];
		$location = $data["location"];
		$address = $data["address"];
		
		$warehouse = new Warehouse($id, $name, $phone, $location, $address);
		$result = $warehouse->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
