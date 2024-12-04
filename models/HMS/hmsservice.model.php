<?php
class HmsService extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $price;

	public function __construct(){
	}
	public function set($id,$name,$price){
		$this->id=$id;
		$this->name=$name;
		$this->price=$price;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}hms_services(name,price)values('$this->name','$this->price')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}hms_services set name='$this->name',price='$this->price' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}hms_services where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,price from {$tx}hms_services");
		$data=[];
		while($hmsservice=$result->fetch_object()){
			$data[]=$hmsservice;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,price from {$tx}hms_services $criteria limit $top,$perpage");
		$data=[];
		while($hmsservice=$result->fetch_object()){
			$data[]=$hmsservice;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}hms_services $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,price from {$tx}hms_services where id='$id'");
		$hmsservice=$result->fetch_object();
			return $hmsservice;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}hms_services");
		$hmsservice =$result->fetch_object();
		return $hmsservice->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Price:$this->price<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbHmsService"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}hms_services");
		while($hmsservice=$result->fetch_object()){
			$html.="<option value ='$hmsservice->id'>$hmsservice->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}hms_services $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,price from {$tx}hms_services $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"hmsservice/create","text"=>"New HmsService"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Price</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Price</th></tr>";
		}
		while($hmsservice=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"hmsservice/show/$hmsservice->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"hmsservice/edit/$hmsservice->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"hmsservice/confirm/$hmsservice->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$hmsservice->id</td><td>$hmsservice->name</td><td>$hmsservice->price</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,price from {$tx}hms_services where id={$id}");
		$hmsservice=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">HmsService Show</th></tr>";
		$html.="<tr><th>Id</th><td>$hmsservice->id</td></tr>";
		$html.="<tr><th>Name</th><td>$hmsservice->name</td></tr>";
		$html.="<tr><th>Price</th><td>$hmsservice->price</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
