<?php
class HmsPatientApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["hms_patients"=>HmsPatient::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["hms_patients"=>HmsPatient::pagination($page,$perpage),"total_records"=>HmsPatient::count()]);
	}
	function find($data){
		echo json_encode(["hmspatient"=>HmsPatient::find($data["id"])]);
	}
	function delete($data){
		HmsPatient::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$hmspatient=new HmsPatient();
		$hmspatient->name=$data["name"];
		$hmspatient->mobile=$data["mobile"];
		$hmspatient->dob=$data["dob"];
		$hmspatient->mob_ext=$data["mob_ext"];
		$hmspatient->gender=$data["gender"];
		$hmspatient->profession=$data["profession"];

		$hmspatient->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$hmspatient=new HmsPatient();
		$hmspatient->id=$data["id"];
		$hmspatient->name=$data["name"];
		$hmspatient->mobile=$data["mobile"];
		$hmspatient->dob=$data["dob"];
		$hmspatient->mob_ext=$data["mob_ext"];
		$hmspatient->gender=$data["gender"];
		$hmspatient->profession=$data["profession"];

		$hmspatient->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
