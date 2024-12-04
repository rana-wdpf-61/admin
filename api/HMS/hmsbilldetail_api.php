<?php
class HmsBillDetailApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["hms_bill_details"=>HmsBillDetail::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["hms_bill_details"=>HmsBillDetail::pagination($page,$perpage),"total_records"=>HmsBillDetail::count()]);
	}
	function find($data){
		echo json_encode(["hmsbilldetail"=>HmsBillDetail::find($data["id"])]);
	}
	function delete($data){
		HmsBillDetail::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$hmsbilldetail=new HmsBillDetail();
		$hmsbilldetail->bill_id=$data["bill_id"];
		$hmsbilldetail->service_id=$data["service_id"];
		$hmsbilldetail->qty=$data["qty"];
		$hmsbilldetail->price=$data["price"];

		$hmsbilldetail->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$hmsbilldetail=new HmsBillDetail();
		$hmsbilldetail->id=$data["id"];
		$hmsbilldetail->bill_id=$data["bill_id"];
		$hmsbilldetail->service_id=$data["service_id"];
		$hmsbilldetail->qty=$data["qty"];
		$hmsbilldetail->price=$data["price"];

		$hmsbilldetail->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
