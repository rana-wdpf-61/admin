<?php
class SubCategoryController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("inventory");
	}
	public function create(){
		view("inventory");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}

*/
		if(count($errors)==0){
			$subcategory=new SubCategory();
		$subcategory->name=$data["name"];
		$subcategory->created_at=$now;
		$subcategory->updated_at=$now;

			$subcategory->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("inventory",SubCategory::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}

*/
		if(count($errors)==0){
			$subcategory=new SubCategory();
			$subcategory->id=$data["id"];
		$subcategory->name=$data["name"];
		$subcategory->created_at=$now;
		$subcategory->updated_at=$now;

		$subcategory->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("inventory");
	}
	public function delete($id){
		SubCategory::delete($id);
		redirect();
	}
	public function show($id){
		view("inventory",SubCategory::find($id));
	}
}
?>
