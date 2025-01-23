<?php
class PortfolioData extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $email;
	public $phone;
	public $message;

	public function __construct(){
	}
	public function set($id,$name,$email,$phone,$message){
		$this->id=$id;
		$this->name=$name;
		$this->email=$email;
		$this->phone=$phone;
		$this->message=$message;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}portfolio_data(name,email,phone,message)values('$this->name','$this->email','$this->phone','$this->message')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}portfolio_data set name='$this->name',email='$this->email',phone='$this->phone',message='$this->message' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}portfolio_data where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,email,phone,message from {$tx}portfolio_data");
		$data=[];
		while($portfoliodata=$result->fetch_object()){
			$data[]=$portfoliodata;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,email,phone,message from {$tx}portfolio_data $criteria limit $top,$perpage");
		$data=[];
		while($portfoliodata=$result->fetch_object()){
			$data[]=$portfoliodata;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}portfolio_data $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,email,phone,message from {$tx}portfolio_data where id='$id'");
		$portfoliodata=$result->fetch_object();
			return $portfoliodata;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}portfolio_data");
		$portfoliodata =$result->fetch_object();
		return $portfoliodata->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Email:$this->email<br> 
		Phone:$this->phone<br> 
		Message:$this->message<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbPortfolioData"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}portfolio_data");
		while($portfoliodata=$result->fetch_object()){
			$html.="<option value ='$portfoliodata->id'>$portfoliodata->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}portfolio_data $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,email,phone,message from {$tx}portfolio_data $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"portfoliodata/create","text"=>"New PortfolioData"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>";
		}
		while($portfoliodata=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"portfoliodata/show/$portfoliodata->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"portfoliodata/edit/$portfoliodata->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"portfoliodata/confirm/$portfoliodata->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$portfoliodata->id</td><td>$portfoliodata->name</td><td>$portfoliodata->email</td><td>$portfoliodata->phone</td><td>$portfoliodata->message</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,email,phone,message from {$tx}portfolio_data where id={$id}");
		$portfoliodata=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">PortfolioData Show</th></tr>";
		$html.="<tr><th>Id</th><td>$portfoliodata->id</td></tr>";
		$html.="<tr><th>Name</th><td>$portfoliodata->name</td></tr>";
		$html.="<tr><th>Email</th><td>$portfoliodata->email</td></tr>";
		$html.="<tr><th>Phone</th><td>$portfoliodata->phone</td></tr>";
		$html.="<tr><th>Message</th><td>$portfoliodata->message</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
