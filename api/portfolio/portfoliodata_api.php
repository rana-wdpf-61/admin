<?php
class PortfolioDataApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["portfolio_data"=>PortfolioData::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["portfolio_data"=>PortfolioData::pagination($page,$perpage),"total_records"=>PortfolioData::count()]);
	}
	function find($data){
		echo json_encode(["portfoliodata"=>PortfolioData::find($data["id"])]);
	}
	function delete($data){
		PortfolioData::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$portfoliodata=new PortfolioData();
		$portfoliodata->name=$data["name"];
		$portfoliodata->email=$data["email"];
		$portfoliodata->phone=$data["phone"];
		$portfoliodata->message=$data["message"];
		
		if($portfoliodata->name != ""){
			$portfoliodata->save();
			echo json_encode(["success" => "yes"]);
		}
		
	}
	function update($data,$file=[]){
		$portfoliodata=new PortfolioData();
		$portfoliodata->id=$data["id"];
		$portfoliodata->name=$data["name"];
		$portfoliodata->email=$data["email"];
		$portfoliodata->phone=$data["phone"];
		$portfoliodata->message=$data["message"];

		$portfoliodata->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
