<?php
class PurchasesController{

    function index(){
        view("purchases");
    }

    function create(){
        view("purchases");
    }

    
    function API(){
        echo json_encode(Purchases::displayAll());
    }


    function save(){
        if(isset($_POST["btnSubmit"])){
            $supplier_id=$_POST["supplier_id"];
            $product_id=$_POST["product_id"];
            $status_id=$_POST["status_id"];
            $order_total=$_POST["order_total"];
            $paid_amount=$_POST["paid_amount"];
            $discount=$_POST["discount"];
            $vat=$_POST["vat"];
            $delivery_date=$_POST["delivery_date"];
            $date=$_POST["date"];
            $shipping_address=$_POST["shipping_address"];
            $description=$_POST["description"];

            $purchases = new Purchases(null, $supplier_id, $product_id, $status_id, $order_total, $paid_amount, $discount, $vat, $delivery_date, $date, $shipping_address, $description);

            $purchases->save();

        }

        redirect("index");
    }


    function edit(){
        $id=$_GET["id"];
        $purchases=Purchases::search($id);
        view("purchases",$purchases);
    }



    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $supplier_id=$_POST["supplier_id"];
            $product_id=$_POST["product_id"];
            $status_id=$_POST["status_id"];
            $order_total=$_POST["order_total"];
            $paid_amount=$_POST["paid_amount"];
            $discount=$_POST["discount"];
            $vat=$_POST["vat"];
            $delivery_date=$_POST["delivery_date"];
            $date=$_POST["date"];
            $shipping_address=$_POST["shipping_address"];
            $description=$_POST["description"];

            $purchases = new Purchases($id, $supplier_id, $product_id, $status_id, $order_total, $paid_amount, $discount, $vat, $delivery_date, $date, $shipping_address, $description);

            $purchases->update();

        }

        redirect("index");
    }



    function delete(){
        $id=$_GET["id"];
        $purchases=Purchases::search($id);
        view("purchases",$purchases);
    }


    function delete_confirm(){
        if(isset($_POST["btnDelete"])){
            $id=$_POST["id"];
            Purchases::delete($id);
        }
        redirect("index");
    }


    function views(){
        $id=$_GET["id"];
        $purchases=Purchases::search($id);
        view("purchases",$purchases);
    }


    function purchasesReport(){
        view("purchases");
    }



}




?>