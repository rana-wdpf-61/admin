<?php 

class ProcessApi{

     function save(){
       // print_r($_POST);
        $data= $_POST;
        $purchase_date=date("Y-m-d",strtotime($data["purchase_date"]));
        $delivery_date=date("Y-m-d",strtotime($data["delivery_date"]));

        $purchase=new Purchase();
        $purchase->supplier_id=$data["supplier_id"];
        $purchase->purchase_date=$purchase_date;
        $purchase->delivery_date=$delivery_date;
        $purchase->shipping_address=$data["shipping_address"];
        $purchase->purchase_total=$data["purchase_total"];
        $purchase->paid_amount=0 ;    //$data["paid_amount"];
        $purchase->remark=$data["remark"];
        $purchase->status_id=1;    //$data["status_id"];
        $purchase->discount=$data["discount"];
        $purchase->vat=$data["vat"];
        $purchase_id= $purchase->save();

      $products=$data["products"];
      $werehouse_id=$data["warehouse_id"];
      foreach(  $products as $data){
         $purchasedetail=new PurchaseDetail();
         $purchasedetail->purchase_id= $purchase_id;
         $purchasedetail->product_id=$data["item_id"];
         $purchasedetail->qty=$data["qty"];
         $purchasedetail->price=$data["price"];
         $purchasedetail->vat=0;   //$data["vat"];
         $purchasedetail->discount=$data["discount"];
         $purchasedetail->save();


         $stock=new Stock();
         $stock->product_id=$data["item_id"];
         $stock->qty=$data["qty"];
         $stock->transaction_type_id=3;    //$data["transaction_type_id"];
         $stock->remark=""; // $data["remark"];
         $stock->warehouse_id=$werehouse_id;
         $stock->save();

      }

    
     echo json_encode(["success" => "yes"]);

   }

}


?>