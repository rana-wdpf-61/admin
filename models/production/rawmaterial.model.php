<?php
class RawMaterial extends Model implements JsonSerializable{
	public $id;
	public $material_name;
	public $description;
	public $quantity;
	public $uom_id;
	public $cost_per_unit;
	public $supplier_id;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$material_name,$description,$quantity,$uom_id,$cost_per_unit,$supplier_id,$created_at,$updated_at){
		$this->id=$id;
		$this->material_name=$material_name;
		$this->description=$description;
		$this->quantity=$quantity;
		$this->uom_id=$uom_id;
		$this->cost_per_unit=$cost_per_unit;
		$this->supplier_id=$supplier_id;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}raw_materials(material_name,description,quantity,uom_id,cost_per_unit,supplier_id,created_at,updated_at)values('$this->material_name','$this->description','$this->quantity','$this->uom_id','$this->cost_per_unit','$this->supplier_id','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}raw_materials set material_name='$this->material_name',description='$this->description',quantity='$this->quantity',uom_id='$this->uom_id',cost_per_unit='$this->cost_per_unit',supplier_id='$this->supplier_id',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}raw_materials where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,material_name,description,quantity,uom_id,cost_per_unit,supplier_id,created_at,updated_at from {$tx}raw_materials");
		$data=[];
		while($rawmaterial=$result->fetch_object()){
			$data[]=$rawmaterial;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,material_name,description,quantity,uom_id,cost_per_unit,supplier_id,created_at,updated_at from {$tx}raw_materials $criteria limit $top,$perpage");
		$data=[];
		while($rawmaterial=$result->fetch_object()){
			$data[]=$rawmaterial;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}raw_materials $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,material_name,description,quantity,uom_id,cost_per_unit,supplier_id,created_at,updated_at from {$tx}raw_materials where id='$id'");
		$rawmaterial=$result->fetch_object();
			return $rawmaterial;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}raw_materials");
		$rawmaterial =$result->fetch_object();
		return $rawmaterial->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Material Name:$this->material_name<br> 
		Description:$this->description<br> 
		Quantity:$this->quantity<br> 
		Uom Id:$this->uom_id<br> 
		Cost Per Unit:$this->cost_per_unit<br> 
		Supplier Id:$this->supplier_id<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//


	static function html_select($material_name= "cmbRawMaterial"){
		global $db,$tx;
		$html = "<select id='$material_name' name='$material_name' class='form-select'> ";
		$result = $db->query("select id, material_name from {$tx}raw_materials");
		while($rawmaterial = $result->fetch_object()){
			$html.="<option value ='$rawmaterial->id'>$rawmaterial->material_name</option>";
		}
		$html .="</select>";
		return $html;
	}


	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}raw_materials $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,material_name,description,quantity,uom_id,cost_per_unit,supplier_id,created_at,updated_at from {$tx}raw_materials $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"rawmaterial/create","text"=>"New RawMaterial"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Material Name</th><th>Description</th><th>Quantity</th><th>Uom Id</th><th>Cost Per Unit</th><th>Supplier Id</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Material Name</th><th>Description</th><th>Quantity</th><th>Uom Id</th><th>Cost Per Unit</th><th>Supplier Id</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($rawmaterial=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"rawmaterial/show/$rawmaterial->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"rawmaterial/edit/$rawmaterial->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"rawmaterial/confirm/$rawmaterial->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$rawmaterial->id</td><td>$rawmaterial->material_name</td><td>$rawmaterial->description</td><td>$rawmaterial->quantity</td><td>$rawmaterial->uom_id</td><td>$rawmaterial->cost_per_unit</td><td>$rawmaterial->supplier_id</td><td>$rawmaterial->created_at</td><td>$rawmaterial->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,material_name,description,quantity,uom_id,cost_per_unit,supplier_id,created_at,updated_at from {$tx}raw_materials where id={$id}");
		$rawmaterial=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">RawMaterial Show</th></tr>";
		$html.="<tr><th>Id</th><td>$rawmaterial->id</td></tr>";
		$html.="<tr><th>Material Name</th><td>$rawmaterial->material_name</td></tr>";
		$html.="<tr><th>Description</th><td>$rawmaterial->description</td></tr>";
		$html.="<tr><th>Quantity</th><td>$rawmaterial->quantity</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$rawmaterial->uom_id</td></tr>";
		$html.="<tr><th>Cost Per Unit</th><td>$rawmaterial->cost_per_unit</td></tr>";
		$html.="<tr><th>Supplier Id</th><td>$rawmaterial->supplier_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$rawmaterial->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$rawmaterial->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
