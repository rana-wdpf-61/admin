<?php
class Production extends Model implements JsonSerializable{
	public $id;
	public $material_id;
	public $uom_id;
	public $product_id;
	public $production_date;
	public $qty;
	public $status_id;
	public $unit_cost;
	public $total_cost;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$material_id,$uom_id,$product_id,$production_date,$qty,$status_id,$unit_cost,$total_cost,$created_at,$updated_at){
		$this->id=$id;
		$this->material_id=$material_id;
		$this->uom_id=$uom_id;
		$this->product_id=$product_id;
		$this->production_date=$production_date;
		$this->qty=$qty;
		$this->status_id=$status_id;
		$this->unit_cost=$unit_cost;
		$this->total_cost=$total_cost;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}production(material_id,uom_id,product_id,production_date,qty,status_id,unit_cost,total_cost,created_at,updated_at)values('$this->material_id','$this->uom_id','$this->product_id','$this->production_date','$this->qty','$this->status_id','$this->unit_cost','$this->total_cost','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}production set material_id='$this->material_id',uom_id='$this->uom_id',product_id='$this->product_id',production_date='$this->production_date',qty='$this->qty',status_id='$this->status_id',unit_cost='$this->unit_cost',total_cost='$this->total_cost',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}production where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,material_id,uom_id,product_id,production_date,qty,status_id,unit_cost,total_cost,created_at,updated_at from {$tx}production");
		$data=[];
		while($production=$result->fetch_object()){
			$data[]=$production;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,material_id,uom_id,product_id,production_date,qty,status_id,unit_cost,total_cost,created_at,updated_at from {$tx}production $criteria limit $top,$perpage");
		$data=[];
		while($production=$result->fetch_object()){
			$data[]=$production;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}production $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,material_id,uom_id,product_id,production_date,qty,status_id,unit_cost,total_cost,created_at,updated_at from {$tx}production where id='$id'");
		$production=$result->fetch_object();
			return $production;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}production");
		$production =$result->fetch_object();
		return $production->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Material Id:$this->material_id<br> 
		Uom Id:$this->uom_id<br> 
		Product Id:$this->product_id<br> 
		Production Date:$this->production_date<br> 
		Qty:$this->qty<br> 
		Status Id:$this->status_id<br> 
		Unit Cost:$this->unit_cost<br> 
		Total Cost:$this->total_cost<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProduction"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}production");
		while($production=$result->fetch_object()){
			$html.="<option value ='$production->id'>$production->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}production $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select core_production .*, core_products.name as product, core_status.name as status, core_uom.name as uom from core_production
		left join core_products on core_production.product_id = core_products.id
		left join core_status on core_production.status_id = core_status.id
		left join core_uom on core_production.uom_id = core_uom.id $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"production/create","text"=>"New Production"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Product Name</th><th>Quantity</th><th>Unit of Mesure</th><th>Total Cost</th><th>Status Id</th><th>Production Date</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Product Name</th><th>Quantity</th><th>Unit Of Mesure</th><th>Total Cost</th><th>Status</th><th>Production Date</th></tr>";
		}
		while($production=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Build Product", "class"=>"btn btn-info", "route"=>"production/show/$production->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$production->id</td><td>$production->product</td><td>$production->qty</td><td>$production->uom</td><td>$production->total_cost</td> <td>$production->status</td><td>$production->production_date</td>$action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,material_id,uom_id,product_id,production_date,qty,status_id,unit_cost,total_cost,created_at,updated_at from {$tx}production where id={$id}");
		$production=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Production Show</th></tr>";
		$html.="<tr><th>Id</th><td>$production->id</td></tr>";
		$html.="<tr><th>Material Id</th><td>$production->material_id</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$production->uom_id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$production->product_id</td></tr>";
		$html.="<tr><th>Production Date</th><td>$production->production_date</td></tr>";
		$html.="<tr><th>Qty</th><td>$production->qty</td></tr>";
		$html.="<tr><th>Status Id</th><td>$production->status_id</td></tr>";
		$html.="<tr><th>Unit Cost</th><td>$production->unit_cost</td></tr>";
		$html.="<tr><th>Total Cost</th><td>$production->total_cost</td></tr>";
		$html.="<tr><th>Created At</th><td>$production->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$production->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
