<?php
class HmsBillApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["hms_bills"=>HmsBill::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["hms_bills"=>HmsBill::pagination($page,$perpage),"total_records"=>HmsBill::count()]);
	}
	function find($data){
		echo json_encode(["hmsbill"=>HmsBill::find($data["id"])]);
	}
	function delete($data){
		HmsBill::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$hmsbill=new HmsBill();
		$hmsbill->patient_id=$data["patient_id"];
		$hmsbill->created_at=$data["created_at"];
		$hmsbill->updated_at=$data["updated_at"];

		$hmsbill->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$hmsbill=new HmsBill();
		$hmsbill->id=$data["id"];
		$hmsbill->patient_id=$data["patient_id"];
		$hmsbill->created_at=$data["created_at"];
		$hmsbill->updated_at=$data["updated_at"];

		$hmsbill->update();
		echo json_encode(["success" => "yes"]);
	}

	function hmsinvoice($data,$file=[]){

		$hmspatient=new HmsPatient();
		$hmspatient->name=$data["pname"];
		$hmspatient->mobile=$data["pmobile"];
		$patient_id= $hmspatient->save();

		$hmsbill=new HmsBill();
		$hmsbill->patient_id=$patient_id;
		$hmsbill->created_at=date("Y-m-d");
		$hmsbill->updated_at=date("Y-m-d");
		$bill_id= $hmsbill->save();

		$bill_details=$data["invoice"];

		foreach ($bill_details as $key => $data) {
			
			$hmsbilldetail=new HmsBillDetail();
			$hmsbilldetail->bill_id=$bill_id;
			$hmsbilldetail->service_id=$data["item_id"];
			$hmsbilldetail->qty=$data["qty"];
			$hmsbilldetail->price=$data["unit_price"];
			$hmsbilldetail->save();
		}

		echo json_encode(["success" => "yes"]);


	}

}
?>
