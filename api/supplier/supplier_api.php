<?php
class SupplierApi extends Api{
	public function __construct(){

		// if(!$this->authorized()){   
		    
		// 	if ($_SERVER['REQUEST_METHOD'] == 'GET') {			  
		// 		http_response_code(401);//Not Authorized
		//   	    die("401 Unauthorized");
		// 	}

		// 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {			  
		// 		http_response_code(401);//Not Authorized
		//   	    die("401 Unauthorized");
		// 	}
			
			
        //  }		
	}

	function index(){
		echo json_encode(["supplier"=>Supplier::all()]);
	
	}

	function find($data){
		echo json_encode(["supplier"=>Supplier::find($data["id"])]);
	}
	function delete($data){
		Supplier::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}

	function save($data,$file=[]){
		$name = $data["name"];
		$photo=upload($file["photo"], "../img/react",$data["name"]);
		$phone = $data["phone"];
		$email = $data["email"];
		$address = $data["address"];

		$supplier = new Supplier(null, $name, $photo, $phone, $email, $address);

		if($name !=""){
			$result = $supplier->save();
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
		
		$supplier = new Supplier($id, $name, $photo, $phone, $email, $address);
		$result = $supplier->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
