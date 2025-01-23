<?php
class BuildApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["build"=>Build::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["build"=>Build::pagination($page,$perpage),"total_records"=>Build::count()]);
	}
	function find($data){
		echo json_encode(["build"=>Build::find($data["id"])]);
	}
	function delete($data){
		Build::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
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
		$build->created_at=$data["created_at"];
		$build->updated_at=$data["updated_at"];
		$build->product_id=$data["product_id"];

		$build->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
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
		$build->created_at=$data["created_at"];
		$build->updated_at=$data["updated_at"];
		$build->product_id=$data["product_id"];

		$build->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
