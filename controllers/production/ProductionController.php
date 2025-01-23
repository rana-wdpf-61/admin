<?php
class ProductionController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("production");
	}
	public function create(){
		view("production");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["material_id"])){
		$errors["material_id"]="Invalid material_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["production_date"])){
		$errors["production_date"]="Invalid production_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["qty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["unit_cost"])){
		$errors["unit_cost"]="Invalid unit_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_cost"])){
		$errors["total_cost"]="Invalid total_cost";
	}

*/
		if(count($errors)==0){
			$production=new Production();
		$production->material_id=$data["material_id"];
		$production->uom_id=$data["uom_id"];
		$production->product_id=$data["product_id"];
		$production->production_date=$data["production_date"];
		$production->qty=$data["qty"];
		$production->status_id=$data["status_id"];
		$production->unit_cost=$data["unit_cost"];
		$production->total_cost=$data["total_cost"];
		$production->created_at=$now;
		$production->updated_at=$now;

			$production->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("production",Production::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["material_id"])){
		$errors["material_id"]="Invalid material_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["production_date"])){
		$errors["production_date"]="Invalid production_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["qty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["unit_cost"])){
		$errors["unit_cost"]="Invalid unit_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_cost"])){
		$errors["total_cost"]="Invalid total_cost";
	}

*/
		if(count($errors)==0){
			$production=new Production();
			$production->id=$data["id"];
		$production->material_id=$data["material_id"];
		$production->uom_id=$data["uom_id"];
		$production->product_id=$data["product_id"];
		$production->production_date=$data["production_date"];
		$production->qty=$data["qty"];
		$production->status_id=$data["status_id"];
		$production->unit_cost=$data["unit_cost"];
		$production->total_cost=$data["total_cost"];
		$production->created_at=$now;
		$production->updated_at=$now;

		$production->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("production");
	}
	public function delete($id){
		Production::delete($id);
		redirect();
	}
	public function show($id){
		view("production",Production::find($id));
	}
}
?>
