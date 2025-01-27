<?php
class StockApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["stock"=>Stock::all()]);
	}

	function index_join_query(){
		echo json_encode(["stock"=>Stock::all_Join_Query()]);
	}

	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["stock"=>Stock::pagination($page,$perpage),"total_records"=>Stock::count()]);
	}
	function find($data){
		echo json_encode(["stock"=>Stock::find($data["id"])]);
	}
	function delete($data){
		Stock::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$stock=new Stock();
		$stock->product_id=$data["product_id"];
		$stock->transaction_type_id=$data["transaction_type_id"];
		$stock->warehouse_id=$data["warehouse_id"];
		$stock->qty=$data["qty"];
		$stock->remark=$data["remark"];
		$stock->created_at=$data["created_at"];
		$stock->updated_at=$data["updated_at"];
		$stock->uom_id=$data["uom_id"];

		$stock->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$stock=new Stock();
		$stock->id=$data["id"];
		$stock->product_id=$data["product_id"];
		$stock->transaction_type_id=$data["transaction_type_id"];
		$stock->warehouse_id=$data["warehouse_id"];
		$stock->qty=$data["qty"];
		$stock->remark=$data["remark"];
		$stock->created_at=$data["created_at"];
		$stock->updated_at=$data["updated_at"];
		$stock->uom_id=$data["uom_id"];

		$stock->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
