<?php
class Purchase extends Model implements JsonSerializable{
	public $id;
	public $supplier_id;
	public $purchase_date;
	public $delivery_date;
	public $shipping_address;
	public $purchase_total;
	public $paid_amount;
	public $remark;
	public $status_id;
	public $discount;
	public $vat;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$supplier_id,$purchase_date,$delivery_date,$shipping_address,$purchase_total,$paid_amount,$remark,$status_id,$discount,$vat,$created_at,$updated_at){
		$this->id=$id;
		$this->supplier_id=$supplier_id;
		$this->purchase_date=$purchase_date;
		$this->delivery_date=$delivery_date;
		$this->shipping_address=$shipping_address;
		$this->purchase_total=$purchase_total;
		$this->paid_amount=$paid_amount;
		$this->remark=$remark;
		$this->status_id=$status_id;
		$this->discount=$discount;
		$this->vat=$vat;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}purchases(supplier_id,purchase_date,delivery_date,shipping_address,purchase_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at)values('$this->supplier_id','$this->purchase_date','$this->delivery_date','$this->shipping_address','$this->purchase_total','$this->paid_amount','$this->remark','$this->status_id','$this->discount','$this->vat','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}purchases set supplier_id='$this->supplier_id',purchase_date='$this->purchase_date',delivery_date='$this->delivery_date',shipping_address='$this->shipping_address',purchase_total='$this->purchase_total',paid_amount='$this->paid_amount',remark='$this->remark',status_id='$this->status_id',discount='$this->discount',vat='$this->vat',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}purchases where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,supplier_id,purchase_date,delivery_date,shipping_address,purchase_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}purchases");
		$data=[];
		while($purchase=$result->fetch_object()){
			$data[]=$purchase;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,supplier_id,purchase_date,delivery_date,shipping_address,purchase_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}purchases $criteria limit $top,$perpage");
		$data=[];
		while($purchase=$result->fetch_object()){
			$data[]=$purchase;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}purchases $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,supplier_id,purchase_date,delivery_date,shipping_address,purchase_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}purchases where id='$id'");
		$purchase=$result->fetch_object();
			return $purchase;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}purchases");
		$purchase =$result->fetch_object();
		return $purchase->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Supplier Id:$this->supplier_id<br> 
		Purchase Date:$this->purchase_date<br> 
		Delivery Date:$this->delivery_date<br> 
		Shipping Address:$this->shipping_address<br> 
		Purchase Total:$this->purchase_total<br> 
		Paid Amount:$this->paid_amount<br> 
		Remark:$this->remark<br> 
		Status Id:$this->status_id<br> 
		Discount:$this->discount<br> 
		Vat:$this->vat<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbPurchase"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}purchases");
		while($purchase=$result->fetch_object()){
			$html.="<option value ='$purchase->id'>$purchase->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}purchases $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,supplier_id,purchase_date,delivery_date,shipping_address,purchase_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}purchases $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"purchase/create","text"=>"New Purchase"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Supplier Id</th><th>Purchase Date</th><th>Delivery Date</th><th>Shipping Address</th><th>Purchase Total</th><th>Paid Amount</th><th>Remark</th><th>Status Id</th><th>Discount</th><th>Vat</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Supplier Id</th><th>Purchase Date</th><th>Delivery Date</th><th>Shipping Address</th><th>Purchase Total</th><th>Paid Amount</th><th>Remark</th><th>Status Id</th><th>Discount</th><th>Vat</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($purchase=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"purchase/show/$purchase->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"purchase/edit/$purchase->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"purchase/confirm/$purchase->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$purchase->id</td><td>$purchase->supplier_id</td><td>$purchase->purchase_date</td><td>$purchase->delivery_date</td><td>$purchase->shipping_address</td><td>$purchase->purchase_total</td><td>$purchase->paid_amount</td><td>$purchase->remark</td><td>$purchase->status_id</td><td>$purchase->discount</td><td>$purchase->vat</td><td>$purchase->created_at</td><td>$purchase->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,supplier_id,purchase_date,delivery_date,shipping_address,purchase_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from {$tx}purchases where id={$id}");
		$purchase=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Purchase Show</th></tr>";
		$html.="<tr><th>Id</th><td>$purchase->id</td></tr>";
		$html.="<tr><th>Supplier Id</th><td>$purchase->supplier_id</td></tr>";
		$html.="<tr><th>Purchase Date</th><td>$purchase->purchase_date</td></tr>";
		$html.="<tr><th>Delivery Date</th><td>$purchase->delivery_date</td></tr>";
		$html.="<tr><th>Shipping Address</th><td>$purchase->shipping_address</td></tr>";
		$html.="<tr><th>Purchase Total</th><td>$purchase->purchase_total</td></tr>";
		$html.="<tr><th>Paid Amount</th><td>$purchase->paid_amount</td></tr>";
		$html.="<tr><th>Remark</th><td>$purchase->remark</td></tr>";
		$html.="<tr><th>Status Id</th><td>$purchase->status_id</td></tr>";
		$html.="<tr><th>Discount</th><td>$purchase->discount</td></tr>";
		$html.="<tr><th>Vat</th><td>$purchase->vat</td></tr>";
		$html.="<tr><th>Created At</th><td>$purchase->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$purchase->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
