<?php
class PortfolioDataController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("portfolio");
	}
	public function create(){
		view("portfolio");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMessage"])){
		$errors["message"]="Invalid message";
	}

*/
		if(count($errors)==0){
			$portfoliodata=new PortfolioData();
		$portfoliodata->name=$data["name"];
		$portfoliodata->email=$data["email"];
		$portfoliodata->phone=$data["phone"];
		$portfoliodata->message=$data["message"];

			$portfoliodata->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("portfolio",PortfolioData::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMessage"])){
		$errors["message"]="Invalid message";
	}

*/
		if(count($errors)==0){
			$portfoliodata=new PortfolioData();
			$portfoliodata->id=$data["id"];
		$portfoliodata->name=$data["name"];
		$portfoliodata->email=$data["email"];
		$portfoliodata->phone=$data["phone"];
		$portfoliodata->message=$data["message"];

		$portfoliodata->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("portfolio");
	}
	public function delete($id){
		PortfolioData::delete($id);
		redirect();
	}
	public function show($id){
		view("portfolio",PortfolioData::find($id));
	}
}
?>
