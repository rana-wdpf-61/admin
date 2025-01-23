<?php
class BuildController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["production_detail_id"])){
		$errors["production_detail_id"]="Invalid production_detail_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["material_id"])){
		$errors["material_id"]="Invalid material_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBuildStep"])){
		$errors["build_step"]="Invalid build_step";
	}
	if(!preg_match("/^[\s\S]+$/",$data["start_date"])){
		$errors["start_date"]="Invalid start_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["end_date"])){
		$errors["end_date"]="Invalid end_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtWorkerAssigned"])){
		$errors["worker_assigned"]="Invalid worker_assigned";
	}
	if(!preg_match("/^[\s\S]+$/",$data["qty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["materials_used"])){
		$errors["materials_used"]="Invalid materials_used";
	}
	if(!preg_match("/^[\s\S]+$/",$data["notes"])){
		$errors["notes"]="Invalid notes";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_cost"])){
		$errors["total_cost"]="Invalid total_cost";
	}

*/
		if(count($errors)==0){
			$build=new Build();
		$build->production_detail_id=$data["production_detail_id"];
		$build->material_id=$data["material_id"];
		$build->uom_id=$data["uom_id"];
		$build->build_step=$data["build_step"];
		$build->start_date=$data["start_date"];
		$build->end_date=$data["end_date"];
		$build->status_id=$data["status_id"];
		$build->worker_assigned=$data["worker_assigned"];
		$build->qty=$data["qty"];
		$build->materials_used=$data["materials_used"];
		$build->notes=$data["notes"];
		$build->created_at=$now;
		$build->updated_at=$now;
		$build->product_id=$data["product_id"];
		$build->total_cost=$data["total_cost"];

			$build->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("production",Build::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["production_detail_id"])){
		$errors["production_detail_id"]="Invalid production_detail_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["material_id"])){
		$errors["material_id"]="Invalid material_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBuildStep"])){
		$errors["build_step"]="Invalid build_step";
	}
	if(!preg_match("/^[\s\S]+$/",$data["start_date"])){
		$errors["start_date"]="Invalid start_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["end_date"])){
		$errors["end_date"]="Invalid end_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtWorkerAssigned"])){
		$errors["worker_assigned"]="Invalid worker_assigned";
	}
	if(!preg_match("/^[\s\S]+$/",$data["qty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["materials_used"])){
		$errors["materials_used"]="Invalid materials_used";
	}
	if(!preg_match("/^[\s\S]+$/",$data["notes"])){
		$errors["notes"]="Invalid notes";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_cost"])){
		$errors["total_cost"]="Invalid total_cost";
	}

*/
		if(count($errors)==0){
			$build=new Build();
			$build->id=$data["id"];
		$build->production_detail_id=$data["production_detail_id"];
		$build->material_id=$data["material_id"];
		$build->uom_id=$data["uom_id"];
		$build->build_step=$data["build_step"];
		$build->start_date=$data["start_date"];
		$build->end_date=$data["end_date"];
		$build->status_id=$data["status_id"];
		$build->worker_assigned=$data["worker_assigned"];
		$build->qty=$data["qty"];
		$build->materials_used=$data["materials_used"];
		$build->notes=$data["notes"];
		$build->created_at=$now;
		$build->updated_at=$now;
		$build->product_id=$data["product_id"];
		$build->total_cost=$data["total_cost"];

		$build->update();
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
		Build::delete($id);
		redirect();
	}
	public function show($id){
		view("production",Build::find($id));
	}
}
?>
