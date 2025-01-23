<?php
class ProductionDetail extends Model implements JsonSerializable{
	public $id;
	public $material_id;
	public $uom_id;
	public $production_id;
	public $product_id;
	public $qty;
	public $start_date;
	public $end_date;
	public $worker_assigned;
	public $status_id;
	public $unit_cost;
	public $total_cost;
	public $notes;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$material_id,$uom_id,$production_id,$product_id,$qty,$start_date,$end_date,$worker_assigned,$status_id,$unit_cost,$total_cost,$notes,$created_at,$updated_at){
		$this->id=$id;
		$this->material_id=$material_id;
		$this->uom_id=$uom_id;
		$this->production_id=$production_id;
		$this->product_id=$product_id;
		$this->qty=$qty;
		$this->start_date=$start_date;
		$this->end_date=$end_date;
		$this->worker_assigned=$worker_assigned;
		$this->status_id=$status_id;
		$this->unit_cost=$unit_cost;
		$this->total_cost=$total_cost;
		$this->notes=$notes;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}production_details(material_id,uom_id,production_id,product_id,qty,start_date,end_date,worker_assigned,status_id,unit_cost,total_cost,notes,created_at,updated_at)values('$this->material_id','$this->uom_id','$this->production_id','$this->product_id','$this->qty','$this->start_date','$this->end_date','$this->worker_assigned','$this->status_id','$this->unit_cost','$this->total_cost','$this->notes','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}production_details set material_id='$this->material_id',uom_id='$this->uom_id',production_id='$this->production_id',product_id='$this->product_id',qty='$this->qty',start_date='$this->start_date',end_date='$this->end_date',worker_assigned='$this->worker_assigned',status_id='$this->status_id',unit_cost='$this->unit_cost',total_cost='$this->total_cost',notes='$this->notes',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}production_details where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,material_id,uom_id,production_id,product_id,qty,start_date,end_date,worker_assigned,status_id,unit_cost,total_cost,notes,created_at,updated_at from {$tx}production_details");
		$data=[];
		while($productiondetail=$result->fetch_object()){
			$data[]=$productiondetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,material_id,uom_id,production_id,product_id,qty,start_date,end_date,worker_assigned,status_id,unit_cost,total_cost,notes,created_at,updated_at from {$tx}production_details $criteria limit $top,$perpage");
		$data=[];
		while($productiondetail=$result->fetch_object()){
			$data[]=$productiondetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}production_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,material_id,uom_id,production_id,product_id,qty,start_date,end_date,worker_assigned,status_id,unit_cost,total_cost,notes,created_at,updated_at from {$tx}production_details where id='$id'");
		$productiondetail=$result->fetch_object();
			return $productiondetail;
	}
	public static function find_all($id){
		global $db,$tx;
		$result =$db->query("select id,material_id,uom_id,production_id,product_id,qty,start_date,end_date,worker_assigned,status_id,unit_cost,total_cost,notes,created_at,updated_at from {$tx}production_details where production_id='$id'");
		$productiondetail=$result->fetch_all(MYSQLI_ASSOC);
			return $productiondetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}production_details");
		$productiondetail =$result->fetch_object();
		return $productiondetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Material Id:$this->material_id<br> 
		Uom Id:$this->uom_id<br> 
		Production Id:$this->production_id<br> 
		Product Id:$this->product_id<br> 
		Qty:$this->qty<br> 
		Start Date:$this->start_date<br> 
		End Date:$this->end_date<br> 
		Worker Assigned:$this->worker_assigned<br> 
		Status Id:$this->status_id<br> 
		Unit Cost:$this->unit_cost<br> 
		Total Cost:$this->total_cost<br> 
		Notes:$this->notes<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProductionDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}production_details");
		while($productiondetail=$result->fetch_object()){
			$html.="<option value ='$productiondetail->id'>$productiondetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}production_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,material_id,uom_id,production_id,product_id,qty,start_date,end_date,worker_assigned,status_id,unit_cost,total_cost,notes,created_at,updated_at from {$tx}production_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"productiondetail/create","text"=>"New ProductionDetail"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Production Id</th><th>Product Id</th><th>Qty</th><th>Start Date</th><th>End Date</th><th>Status Id</th><th>Total Cost</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Production Id</th><th>Product Id</th><th>Qty</th><th>Start Date</th><th>End Date</th><th>Status Id</th><th>Total Cost</th></tr>";
		}
		while($productiondetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"productiondetail/show/$productiondetail->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"productiondetail/edit/$productiondetail->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"productiondetail/confirm/$productiondetail->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$productiondetail->id</td><td>$productiondetail->uom_id</td<td>$productiondetail->production_id</td><td>$productiondetail->product_id</td><td>$productiondetail->qty</td><td>$productiondetail->start_date</td><td>$productiondetail->end_date</td><td>$productiondetail->status_id</td><td>$productiondetail->total_cost</td>$action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,material_id,uom_id,production_id,product_id,qty,start_date,end_date,worker_assigned,status_id,unit_cost,total_cost,notes,created_at,updated_at from {$tx}production_details where id={$id}");
		$productiondetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">ProductionDetail Show</th></tr>";
		$html.="<tr><th>Id</th><td>$productiondetail->id</td></tr>";
		$html.="<tr><th>Material Id</th><td>$productiondetail->material_id</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$productiondetail->uom_id</td></tr>";
		$html.="<tr><th>Production Id</th><td>$productiondetail->production_id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$productiondetail->product_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$productiondetail->qty</td></tr>";
		$html.="<tr><th>Start Date</th><td>$productiondetail->start_date</td></tr>";
		$html.="<tr><th>End Date</th><td>$productiondetail->end_date</td></tr>";
		$html.="<tr><td>$productiondetail->worker_assigned</td></tr>";
		$html.="<tr><th>Status Id</th><td>$productiondetail->status_id</td></tr>";
		$html.="<tr><td>$productiondetail->unit_cost</td></tr>";
		$html.="<tr><th>Total Cost</th><td>$productiondetail->total_cost</td></tr>";
		$html.="<tr><td>$productiondetail->notes</td></tr>";
		$html.="<tr><th>Created At</th><td>$productiondetail->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$productiondetail->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
