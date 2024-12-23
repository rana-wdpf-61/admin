<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbMemberTypeId"])){
		$errors["member_type_id"]="Invalid member_type_id";
	}
	if(!is_valid_mobile($_POST["txtMobile"])){
		$errors["mobile"]="Invalid mobile";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDoj"])){
		$errors["doj"]="Invalid doj";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhoto"])){
		$errors["photo"]="Invalid photo";
	}

*/
	if(count($errors)==0){
		$member=new Member();
		$member->name=$_POST["txtName"];
		$member->member_type_id=$_POST["cmbMemberTypeId"];
		$member->mobile=$_POST["txtMobile"];
		$member->address=$_POST["txtAddress"];
		$member->doj=$_POST["txtDoj"];
		$member->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);
		$member->created_at=$now;
		$member->created_at=$now;

		$member->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="members">Manage Member</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-member' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=select_field(["label"=>"Member Type","name"=>"cmbMemberTypeId","table"=>"member_types"]);
	$html.=input_field(["label"=>"Mobile","type"=>"text","name"=>"txtMobile"]);
	$html.=input_field(["label"=>"Address","type"=>"text","name"=>"txtAddress"]);
	$html.=input_field(["label"=>"Doj","type"=>"text","name"=>"txtDoj"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
