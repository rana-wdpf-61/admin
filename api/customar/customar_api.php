<?php
class CustomarApi{
	public function __construct(){
	}

	function index(){
		echo json_encode(["customar"=>Customar::all()]);
	}

	function find($data){
		echo json_encode(["customar"=>Customar::find($data["id"])]);
	}
	function delete($data){
		Customar::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}

	function save($data,$file=[]){
		$name = $data["name"];
		$photo=upload($file["photo"], "../img",$data["name"]);
		$phone = $data["phone"];
		$email = $data["email"];
		$address = $data["address"];

		$customar = new Customar(null, $name, $photo, $phone, $email,  $address);

		if($name != ""){
			$result = $customar->save();
			echo json_encode(["success" => "yes"]);
		}

		
	}

	function update($data,$file=[]){
		$id = $data["id"];
		$name = $data["name"];
		$photo=upload($file["photo"], "../img",$data["name"]);
		$phone = $data["phone"];
		$email = $data["email"];
		$address = $data["address"];
		
		$customar = new Customar($id, $name, $photo, $phone, $email,  $address);
		$result = $customar->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
