<?php
class ProductionDetailController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["production_id"])){
		$errors["production_id"]="Invalid production_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["qty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["start_date"])){
		$errors["start_date"]="Invalid start_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["end_date"])){
		$errors["end_date"]="Invalid end_date";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtWorkerAssigned"])){
		$errors["worker_assigned"]="Invalid worker_assigned";
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtNotes"])){
		$errors["notes"]="Invalid notes";
	}

*/
		if(count($errors)==0){
			$productiondetail=new ProductionDetail();
		$productiondetail->material_id=$data["material_id"];
		$productiondetail->uom_id=$data["uom_id"];
		$productiondetail->production_id=$data["production_id"];
		$productiondetail->product_id=$data["product_id"];
		$productiondetail->qty=$data["qty"];
		$productiondetail->start_date=$data["start_date"];
		$productiondetail->end_date=$data["end_date"];
		$productiondetail->worker_assigned=$data["worker_assigned"];
		$productiondetail->status_id=$data["status_id"];
		$productiondetail->unit_cost=$data["unit_cost"];
		$productiondetail->total_cost=$data["total_cost"];
		$productiondetail->notes=$data["notes"];
		$productiondetail->created_at=$now;
		$productiondetail->updated_at=$now;

			$productiondetail->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("production",ProductionDetail::find($id));
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
	if(!preg_match("/^[\s\S]+$/",$data["production_id"])){
		$errors["production_id"]="Invalid production_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["qty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["start_date"])){
		$errors["start_date"]="Invalid start_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["end_date"])){
		$errors["end_date"]="Invalid end_date";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtWorkerAssigned"])){
		$errors["worker_assigned"]="Invalid worker_assigned";
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtNotes"])){
		$errors["notes"]="Invalid notes";
	}

*/
		if(count($errors)==0){
			$productiondetail=new ProductionDetail();
			$productiondetail->id=$data["id"];
		$productiondetail->material_id=$data["material_id"];
		$productiondetail->uom_id=$data["uom_id"];
		$productiondetail->production_id=$data["production_id"];
		$productiondetail->product_id=$data["product_id"];
		$productiondetail->qty=$data["qty"];
		$productiondetail->start_date=$data["start_date"];
		$productiondetail->end_date=$data["end_date"];
		$productiondetail->worker_assigned=$data["worker_assigned"];
		$productiondetail->status_id=$data["status_id"];
		$productiondetail->unit_cost=$data["unit_cost"];
		$productiondetail->total_cost=$data["total_cost"];
		$productiondetail->notes=$data["notes"];
		$productiondetail->created_at=$now;
		$productiondetail->updated_at=$now;

		$productiondetail->update();
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
		ProductionDetail::delete($id);
		redirect();
	}
	public function show($id){
		view("production",ProductionDetail::find($id));
	}
}
?>
