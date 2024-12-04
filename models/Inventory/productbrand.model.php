<?php
class ProductBrand extends Model implements JsonSerializable{
	public $id;
	public $name;

	public function __construct(){
	}
	public function set($id,$name){
		$this->id=$id;
		$this->name=$name;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}product_brands(name)values('$this->name')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}product_brands set name='$this->name' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}product_brands where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}product_brands");
		$data=[];
		while($productbrand=$result->fetch_object()){
			$data[]=$productbrand;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name from {$tx}product_brands $criteria limit $top,$perpage");
		$data=[];
		while($productbrand=$result->fetch_object()){
			$data[]=$productbrand;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}product_brands $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name from {$tx}product_brands where id='$id'");
		$productbrand=$result->fetch_object();
			return $productbrand;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}product_brands");
		$productbrand =$result->fetch_object();
		return $productbrand->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProductBrand"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}product_brands");
		while($productbrand=$result->fetch_object()){
			$html.="<option value ='$productbrand->id'>$productbrand->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}product_brands $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name from {$tx}product_brands $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"productbrand/create","text"=>"New ProductBrand"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th></tr>";
		}
		while($productbrand=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"productbrand/show/$productbrand->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"productbrand/edit/$productbrand->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"productbrand/confirm/$productbrand->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$productbrand->id</td><td>$productbrand->name</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name from {$tx}product_brands where id={$id}");
		$productbrand=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">ProductBrand Show</th></tr>";
		$html.="<tr><th>Id</th><td>$productbrand->id</td></tr>";
		$html.="<tr><th>Name</th><td>$productbrand->name</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
