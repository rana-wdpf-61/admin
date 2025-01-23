<?php
class RawMaterialController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMaterialName"])){
		$errors["material_name"]="Invalid material_name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["description"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["cost_per_unit"])){
		$errors["cost_per_unit"]="Invalid cost_per_unit";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtSupplierId"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}

*/
		if(count($errors)==0){
			$rawmaterial=new RawMaterial();
		$rawmaterial->material_name=$data["material_name"];
		$rawmaterial->description=$data["description"];
		$rawmaterial->quantity=$data["quantity"];
		$rawmaterial->uom_id=$data["uom_id"];
		$rawmaterial->cost_per_unit=$data["cost_per_unit"];
		$rawmaterial->supplier_id=$data["supplier_id"];
		$rawmaterial->created_at=$now;
		$rawmaterial->updated_at=$now;

			$rawmaterial->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("production",RawMaterial::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMaterialName"])){
		$errors["material_name"]="Invalid material_name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["description"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["cost_per_unit"])){
		$errors["cost_per_unit"]="Invalid cost_per_unit";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtSupplierId"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}

*/
		if(count($errors)==0){
			$rawmaterial=new RawMaterial();
			$rawmaterial->id=$data["id"];
		$rawmaterial->material_name=$data["material_name"];
		$rawmaterial->description=$data["description"];
		$rawmaterial->quantity=$data["quantity"];
		$rawmaterial->uom_id=$data["uom_id"];
		$rawmaterial->cost_per_unit=$data["cost_per_unit"];
		$rawmaterial->supplier_id=$data["supplier_id"];
		$rawmaterial->created_at=$now;
		$rawmaterial->updated_at=$now;

		$rawmaterial->update();
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
		RawMaterial::delete($id);
		redirect();
	}
	public function show($id){
		view("production",RawMaterial::find($id));
	}
}
?>
