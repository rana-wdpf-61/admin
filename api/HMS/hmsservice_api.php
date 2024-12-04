<?php
class HmsServiceApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["hms_services"=>HmsService::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["hms_services"=>HmsService::pagination($page,$perpage),"total_records"=>HmsService::count()]);
	}
	function find($data){
		echo json_encode(["hmsservice"=>HmsService::find($data["sid"])]);
	}
	function delete($data){
		HmsService::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$hmsservice=new HmsService();
		$hmsservice->name=$data["name"];
		$hmsservice->price=$data["price"];

		$hmsservice->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$hmsservice=new HmsService();
		$hmsservice->id=$data["id"];
		$hmsservice->name=$data["name"];
		$hmsservice->price=$data["price"];

		$hmsservice->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
