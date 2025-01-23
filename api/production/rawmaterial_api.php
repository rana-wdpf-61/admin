<?php
class RawMaterialApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["raw_materials"=>RawMaterial::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["raw_materials"=>RawMaterial::pagination($page,$perpage),"total_records"=>RawMaterial::count()]);
	}
	function find($data){
		echo json_encode(["rawmaterial"=>RawMaterial::find($data["id"])]);
	}
	function delete($data){
		RawMaterial::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$rawmaterial=new RawMaterial();
		$rawmaterial->material_name=$data["material_name"];
		$rawmaterial->description=$data["description"];
		$rawmaterial->uom_id=$data["uom_id"];
		$rawmaterial->supplier_id=$data["supplier_id"];
		$rawmaterial->created_at=$data["created_at"];
		$rawmaterial->updated_at=$data["updated_at"];

		$rawmaterial->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$rawmaterial=new RawMaterial();
		$rawmaterial->id=$data["id"];
		$rawmaterial->material_name=$data["material_name"];
		$rawmaterial->description=$data["description"];
		$rawmaterial->uom_id=$data["uom_id"];
		$rawmaterial->supplier_id=$data["supplier_id"];
		$rawmaterial->created_at=$data["created_at"];
		$rawmaterial->updated_at=$data["updated_at"];

		$rawmaterial->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
