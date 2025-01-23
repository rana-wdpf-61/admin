<?php
class Build extends Model implements JsonSerializable{
	public $id;
	public $production_detail_id;
	public $material_id;
	public $uom_id;
	public $build_step;
	public $start_date;
	public $end_date;
	public $status_id;
	public $worker_assigned;
	public $qty;
	public $materials_used;
	public $notes;
	public $created_at;
	public $updated_at;
	public $product_id;
	public $total_cost;

	public function __construct(){
	}
	public function set($id,$production_detail_id,$material_id,$uom_id,$build_step,$start_date,$end_date,$status_id,$worker_assigned,$qty,$materials_used,$notes,$created_at,$updated_at,$product_id,$total_cost){
		$this->id=$id;
		$this->production_detail_id=$production_detail_id;
		$this->material_id=$material_id;
		$this->uom_id=$uom_id;
		$this->build_step=$build_step;
		$this->start_date=$start_date;
		$this->end_date=$end_date;
		$this->status_id=$status_id;
		$this->worker_assigned=$worker_assigned;
		$this->qty=$qty;
		$this->materials_used=$materials_used;
		$this->notes=$notes;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
		$this->product_id=$product_id;
		$this->total_cost=$total_cost;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}build(production_detail_id,material_id,uom_id,build_step,start_date,end_date,status_id,worker_assigned,qty,materials_used,notes,created_at,updated_at,product_id,total_cost)values('$this->production_detail_id','$this->material_id','$this->uom_id','$this->build_step','$this->start_date','$this->end_date','$this->status_id','$this->worker_assigned','$this->qty','$this->materials_used','$this->notes','$this->created_at','$this->updated_at','$this->product_id','$this->total_cost')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}build set production_detail_id='$this->production_detail_id',material_id='$this->material_id',uom_id='$this->uom_id',build_step='$this->build_step',start_date='$this->start_date',end_date='$this->end_date',status_id='$this->status_id',worker_assigned='$this->worker_assigned',qty='$this->qty',materials_used='$this->materials_used',notes='$this->notes',created_at='$this->created_at',updated_at='$this->updated_at',product_id='$this->product_id',total_cost='$this->total_cost' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}build where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,production_detail_id,material_id,uom_id,build_step,start_date,end_date,status_id,worker_assigned,qty,materials_used,notes,created_at,updated_at,product_id,total_cost from {$tx}build");
		$data=[];
		while($build=$result->fetch_object()){
			$data[]=$build;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,production_detail_id,material_id,uom_id,build_step,start_date,end_date,status_id,worker_assigned,qty,materials_used,notes,created_at,updated_at,product_id,total_cost from {$tx}build $criteria limit $top,$perpage");
		$data=[];
		while($build=$result->fetch_object()){
			$data[]=$build;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}build $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}

	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,production_detail_id,material_id,uom_id,build_step,start_date,end_date,status_id,worker_assigned,qty,materials_used,notes,created_at,updated_at,product_id,total_cost from {$tx}build where id='$id'");
		$build=$result->fetch_object();
			return $build;
	}

	public static function find_all($id){
		global $db,$tx;
		$result =$db->query("select id,production_detail_id,material_id,uom_id,build_step,start_date,end_date,status_id,worker_assigned,qty,materials_used,notes,created_at,updated_at,product_id,total_cost from {$tx}build where production_detail_id='$id'");
		$build=$result->fetch_all(MYSQLI_ASSOC);
			return $build;
	}
	
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}build");
		$build =$result->fetch_object();
		return $build->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Production Detail Id:$this->production_detail_id<br> 
		Material Id:$this->material_id<br> 
		Uom Id:$this->uom_id<br> 
		Build Step:$this->build_step<br> 
		Start Date:$this->start_date<br> 
		End Date:$this->end_date<br> 
		Status Id:$this->status_id<br> 
		Worker Assigned:$this->worker_assigned<br> 
		Qty:$this->qty<br> 
		Materials Used:$this->materials_used<br> 
		Notes:$this->notes<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
		Product Id:$this->product_id<br> 
		Total Cost:$this->total_cost<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbBuild"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}build");
		while($build=$result->fetch_object()){
			$html.="<option value ='$build->id'>$build->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}build $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select core_build .*, core_products.name as product, core_status.name as status, core_uom.name as uom from core_build
		left join core_products on core_build.product_id = core_products.id
		left join core_status on core_build.status_id = core_status.id
		left join core_uom on core_build.uom_id = core_uom.id $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"build/create","text"=>"New Build"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Product</th><th>Qty</th><th>Uom</th><th>Total Cost</th><th>Status</th><th>Notes</th><th>Start Date</th><th>End Date</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Product</th><th>Qty</th><th>Uom</th><th>Total Cost</th><th>Status</th><th>Notes</th><th>Start Date</th><th>End Date</th><th>Action</th></tr>";
		}
		while($build=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"build/show/$build->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"build/edit/$build->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"build/confirm/$build->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$build->id</td><td>$build->product</td><td>$build->qty</td><td>$build->uom</td><td>$build->total_cost</td><td>$build->status</td><td>$build->notes</td><td>$build->start_date</td><td>$build->end_date</td>$action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select core_build .*, core_products.name as product, core_status.name as status, core_uom.name as uom from core_build
		left join core_products on core_build.product_id = core_products.id
		left join core_status on core_build.status_id = core_status.id
		left join core_uom on core_build.uom_id = core_uom.id where core_build.id=$id");
		$build=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Build Show</th></tr>";
		$html.="<tr><th>Id</th><td>$build->id</td></tr>";
		$html.="<tr><th>Product</th><td>$build->product</td></tr>";
		$html.="<tr><th>Qty</th><td>$build->qty</td></tr>";
		$html.="<tr><th>Uom</th><td>$build->uom</td></tr>";
		$html.="<tr><th>Total Cost</th><td>$build->total_cost</td></tr>";
		$html.="<tr><th>Status</th><td>$build->status</td></tr>";
		$html.="<tr><th>Notes</th><td>$build->notes</td></tr>";
		$html.="<tr><th>Start Date</th><td>$build->start_date</td></tr>";
		$html.="<tr><th>End Date</th><td>$build->end_date</td></tr>";
		$html.="</table>";
		return $html;
	}
}
?>
