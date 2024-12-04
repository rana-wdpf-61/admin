<?php
class HmsBillController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("HMS");
	}
	public function create(){
		view("HMS");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["patient_id"])){
		$errors["patient_id"]="Invalid patient_id";
	}

*/
		if(count($errors)==0){
			$hmsbill=new HmsBill();
		$hmsbill->patient_id=$data["patient_id"];
		$hmsbill->created_at=$now;
		$hmsbill->updated_at=$now;

			$hmsbill->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("HMS",HmsBill::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["patient_id"])){
		$errors["patient_id"]="Invalid patient_id";
	}

*/
		if(count($errors)==0){
			$hmsbill=new HmsBill();
			$hmsbill->id=$data["id"];
		$hmsbill->patient_id=$data["patient_id"];
		$hmsbill->created_at=$now;
		$hmsbill->updated_at=$now;

		$hmsbill->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("HMS");
	}
	public function delete($id){
		
		HmsBillDetail::delete_hmsid($id);
		HmsBill::delete($id);
	


		redirect();
	}
	public function show($id){
		view("HMS",HmsBill::find($id));
	}
}
?>
