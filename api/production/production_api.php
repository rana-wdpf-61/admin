<?php
class ProductionApi
{
	public function __construct() {}
	function index()
	{
		echo json_encode(["production" => Production::all()]);
	}
	function pagination($data)
	{
		$page = $data["page"];
		$perpage = $data["perpage"];
		echo json_encode(["production" => Production::pagination($page, $perpage), "total_records" => Production::count()]);
	}
	function find($data)
	{
		echo json_encode(["production" => Production::find($data["id"])]);
	}
	function delete($data)
	{
		Production::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data, $file = [])
	{
		$production = new Production();
		$production->material_id = $data["material_id"];
		$production->uom_id = $data["uom_id"];
		$production->product_id = $data["product_id"];
		$production->production_date = $data["production_date"];
		$production->qty = $data["qty"];
		$production->status_id = $data["status_id"];
		$production->created_at = $data["created_at"];
		$production->updated_at = $data["updated_at"];

		$production->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data, $file = [])
	{
		$production = new Production();
		$production->id = $data["id"];
		$production->material_id = $data["material_id"];
		$production->uom_id = $data["uom_id"];
		$production->product_id = $data["product_id"];
		$production->production_date = $data["production_date"];
		$production->qty = $data["qty"];
		$production->status_id = $data["status_id"];
		$production->created_at = $data["created_at"];
		$production->updated_at = $data["updated_at"];

		$production->update();
		echo json_encode(["success" => "yes"]);
	}






	function build($data)
	{


		print_r($data);
		$product_id = $data["build_main_product_id"];
		$uom_id = $data["build_uom_id"];
		$build_qty = $data["build_qty"];
		$start_date = $data["start_date"];
		$end_date = $data["end_date"];
		$total_cost = $data["total_cost"];
		$products = $data["products"];

		$build = new Build();
		$build->production_detail_id = 0;
		$build->material_id =0; //$material_id;
		$build->product_id= $product_id;
		$build->uom_id = $uom_id;
		$build->build_step = 0;
		$build->start_date = $start_date;
		$build->end_date = $end_date;
		$build->total_cost = $total_cost;
		$build->status_id = 2;
		$build->worker_assigned = 5;
		$build->qty = $build_qty;
		$build->materials_used = 0;
		$build->notes = $data["notes"] ?? "build";
		$build->created_at = date("Y-m-d");
		$build->updated_at = date("Y-m-d");
		$build->save();


		$transaction_type_id = 5;     //$data["transaction_type_id"];
		$warehouse_id =	1;
		$remark = "Build";   //$data["remark"];
		$product_id= $product_id;
		$qty = $build_qty;
		$result = new Stock(null, $product_id, $transaction_type_id, $warehouse_id, $qty, $remark);
		$result->save();

        foreach ($products as $key => $value) {
			
		$transaction_type_id = 5;     //$data["transaction_type_id"];
		$warehouse_id =	1;
		$remark = "Build";   //$data["remark"];
		$product_id=$value['id'];
		$qty = $value['qty'] * -1;
		$result = new Stock(null, $product_id, $transaction_type_id, $warehouse_id, $qty, $remark);
		$result->save();
			
		}


		echo json_encode(["success" => "yes"]);


	}




	function process($data)
	{

		print_r($data);

		$data = $data;
		$start_date = date("Y-m-d", strtotime($data["start_date"]));
		$end_date = date("Y-m-d", strtotime($data["end_date"]));

		$production = new Production();
		$production->material_id = ""; //$data["material_id"];
		$production->uom_id = 7;  // $data["uom_id"];
		$production->product_id = $data["product_id"];
		$production->production_date = $start_date; //$data["production_date"];
		$production->qty =$data ["qty"];
		$production->unit_cost = "";   //$data[""];
		$production->total_cost = $data["total_cost"];
		$production->status_id = 2;   //$data["status_id"];

		$production_last_id = $production->save();

		$productions = $data["production"];
		$total_cost = $data["total_cost"];
		$uom_id = $data["uom_id"];
		foreach ($productions as $value) {
			$productiondetail = new ProductionDetail();
			$productiondetail->material_id = "";  //$value ["item_id"];
			$productiondetail->uom_id = $uom_id; //$value ["uom_id"];
			$productiondetail->production_id = $production_last_id;
			$productiondetail->product_id = $value["item_id"];
			$productiondetail->qty = $value["qty"];
			$productiondetail->start_date = $start_date;    //start_date=$value ["start_date"];
			$productiondetail->end_date = $end_date;    //end_date=$value ["end_date"];
			$productiondetail->worker_assigned = "";  //$value ["worker_assigned"];
			$productiondetail->status_id = 2; //$value ["status_id"];
			$productiondetail->unit_cost = $value["price"];
			$productiondetail->total_cost = $total_cost;
			$productiondetail->notes = "";  // $value ["notes"];//$value ["notes"];

			$productiondetail->save();
		}
		echo json_encode(["success" => "yes"]);
	}
}
