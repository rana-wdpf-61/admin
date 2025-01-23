<?php
class Production_processApi
{

	function save($data)
	{

 	 	//print_r($data);

		   $data= $data;
		  $start_date=date("Y-m-d",strtotime($data["start_date"]));
		  $end_date=date("Y-m-d",strtotime($data["end_date"]));

          $production=new Production();
          $production->material_id=$data["material_id"];
          $production->uom_id=$data["uom_id"];
          $production->product_id=$data["product_id"];
          $production->production_date=$data["production_date"];
          $production->qty=$data["qty"];
          $production->status_id= 1 ;   //$data["status_id"];
  
          $production_last_id=$production->save();

		$production = $data["production"];

		foreach ($production as $value) {
            $productiondetail=new ProductionDetail();
            $productiondetail->material_id=$value ["material_id"];
            $productiondetail->uom_id=$value ["uom_id"];
            $productiondetail->production_id= $production_last_id;
            $productiondetail->product_id=$value ["product_id"];
            $productiondetail->qty=$value ["qty"];
            $productiondetail->start_date=$value ["start_date"];
            $productiondetail->end_date=$value ["end_date"];
            $productiondetail->worker_assigned= "" ;  //$value ["worker_assigned"];
            $productiondetail->status_id= 1 ; //$value ["status_id"];
            $productiondetail->notes= "" ; //$value ["notes"];
    
            $productiondetail->save();
		}
		echo json_encode(["success" => "yes"]);
	}
}
