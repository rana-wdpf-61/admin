<?php
class ProductionDetailApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["production_details"=>ProductionDetail::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["production_details"=>ProductionDetail::pagination($page,$perpage),"total_records"=>ProductionDetail::count()]);
	}
	function find($data){
		echo json_encode(["productiondetail"=>ProductionDetail::find($data["id"])]);
	}
	function delete($data){
		ProductionDetail::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
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
		$productiondetail->created_at=$data["created_at"];
		$productiondetail->updated_at=$data["updated_at"];

		$productiondetail->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
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
		$productiondetail->created_at=$data["created_at"];
		$productiondetail->updated_at=$data["updated_at"];

		$productiondetail->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
