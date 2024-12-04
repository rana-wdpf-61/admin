<?php
class HmsBillDetail extends Model implements JsonSerializable{
	public $id;
	public $bill_id;
	public $service_id;
	public $qty;
	public $price;

	public function __construct(){
	}
	public function set($id,$bill_id,$service_id,$qty,$price){
		$this->id=$id;
		$this->bill_id=$bill_id;
		$this->service_id=$service_id;
		$this->qty=$qty;
		$this->price=$price;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}hms_bill_details(bill_id,service_id,qty,price)values('$this->bill_id','$this->service_id','$this->qty','$this->price')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}hms_bill_details set bill_id='$this->bill_id',service_id='$this->service_id',qty='$this->qty',price='$this->price' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}hms_bill_details where id={$id}");
	}
	public static function delete_hmsid($id){
		global $db,$tx;
		$db->query("delete from {$tx}hms_bill_details where bill_id={$id}");
		return $db;
	}

	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,bill_id,service_id,qty,price from {$tx}hms_bill_details");
		$data=[];
		while($hmsbilldetail=$result->fetch_object()){
			$data[]=$hmsbilldetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,bill_id,service_id,qty,price from {$tx}hms_bill_details $criteria limit $top,$perpage");
		$data=[];
		while($hmsbilldetail=$result->fetch_object()){
			$data[]=$hmsbilldetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}hms_bill_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}

	public static function bill_detials($id){
		global $db,$tx;
		$result =$db->query("select id,bill_id,service_id,qty,price from {$tx}hms_bill_details where bill_id='$id'");
		$hmsbilldetail=$result->fetch_all(MYSQLI_ASSOC);
			return $hmsbilldetail;
	}

	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,bill_id,service_id,qty,price from {$tx}hms_bill_details where id='$id'");
		$hmsbilldetail=$result->fetch_object();
			return $hmsbilldetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}hms_bill_details");
		$hmsbilldetail =$result->fetch_object();
		return $hmsbilldetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Bill Id:$this->bill_id<br> 
		Service Id:$this->service_id<br> 
		Qty:$this->qty<br> 
		Price:$this->price<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbHmsBillDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}hms_bill_details");
		while($hmsbilldetail=$result->fetch_object()){
			$html.="<option value ='$hmsbilldetail->id'>$hmsbilldetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}hms_bill_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,bill_id,service_id,qty,price from {$tx}hms_bill_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"hmsbilldetail/create","text"=>"New HmsBillDetail"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Bill Id</th><th>Service Id</th><th>Qty</th><th>Price</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Bill Id</th><th>Service Id</th><th>Qty</th><th>Price</th></tr>";
		}
		while($hmsbilldetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"hmsbilldetail/show/$hmsbilldetail->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"hmsbilldetail/edit/$hmsbilldetail->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"hmsbilldetail/confirm/$hmsbilldetail->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$hmsbilldetail->id</td><td>$hmsbilldetail->bill_id</td><td>$hmsbilldetail->service_id</td><td>$hmsbilldetail->qty</td><td>$hmsbilldetail->price</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,bill_id,service_id,qty,price from {$tx}hms_bill_details where id={$id}");
		$hmsbilldetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">HmsBillDetail Show</th></tr>";
		$html.="<tr><th>Id</th><td>$hmsbilldetail->id</td></tr>";
		$html.="<tr><th>Bill Id</th><td>$hmsbilldetail->bill_id</td></tr>";
		$html.="<tr><th>Service Id</th><td>$hmsbilldetail->service_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$hmsbilldetail->qty</td></tr>";
		$html.="<tr><th>Price</th><td>$hmsbilldetail->price</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
