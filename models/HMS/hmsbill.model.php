<?php
class HmsBill extends Model implements JsonSerializable{
	public $id;
	public $patient_id;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$patient_id,$created_at,$updated_at){
		$this->id=$id;
		$this->patient_id=$patient_id;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}hms_bills(patient_id,created_at,updated_at)values('$this->patient_id','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}hms_bills set patient_id='$this->patient_id',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}hms_bills where id={$id}");
		return $db;
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,patient_id,created_at,updated_at from {$tx}hms_bills");
		$data=[];
		while($hmsbill=$result->fetch_object()){
			$data[]=$hmsbill;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,patient_id,created_at,updated_at from {$tx}hms_bills $criteria limit $top,$perpage");
		$data=[];
		while($hmsbill=$result->fetch_object()){
			$data[]=$hmsbill;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}hms_bills $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,patient_id,created_at,updated_at from {$tx}hms_bills where id='$id'");
		$hmsbill=$result->fetch_object();
			return $hmsbill;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}hms_bills");
		$hmsbill =$result->fetch_object();
		return $hmsbill->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Patient Id:$this->patient_id<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbHmsBill"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}hms_bills");
		while($hmsbill=$result->fetch_object()){
			$html.="<option value ='$hmsbill->id'>$hmsbill->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}hms_bills $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,patient_id,created_at,updated_at from {$tx}hms_bills $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"hmsbill/create","text"=>"New HmsBill"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Patient Id</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Patient Id</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($hmsbill=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"hmsbill/show/$hmsbill->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"hmsbill/edit/$hmsbill->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"hmsbill/confirm/$hmsbill->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$hmsbill->id</td><td>$hmsbill->patient_id</td><td>$hmsbill->created_at</td><td>$hmsbill->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,patient_id,created_at,updated_at from {$tx}hms_bills where id={$id}");
		$hmsbill=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">HmsBill Show</th></tr>";
		$html.="<tr><th>Id</th><td>$hmsbill->id</td></tr>";
		$html.="<tr><th>Patient Id</th><td>$hmsbill->patient_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$hmsbill->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$hmsbill->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
