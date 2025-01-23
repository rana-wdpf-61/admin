<?php
class OrderController{
    function index(){
        view("sales");
    }


    function create(){
        view("sales");
    }

    function save(){
        if(isset($_POST["btnSubmit"])){
            $customars_id=$_POST["customars_id"];
            $order_total=$_POST["order_total"];
            $discount=$_POST["discount"];
            $shipping_address=$_POST["shipping_address"];
            $paid_amount=$_POST["paid_amount"];
            $status_id=$_POST["status_id"];
            $order_date=$_POST["order_date"];
            $delivery_date=$_POST["delivery_date"];
            $vat=$_POST["vat"];
            $uom_id=$_POST["uom_id"];

            $result = new Order(null, $customars_id, $order_total, $discount, $shipping_address, $paid_amount, $status_id, $order_date, $delivery_date, $vat, $uom_id);

            $result->save();
        }

        redirect("index");
    }


    function edit(){
        $id=$_GET["id"];
       $order = Order::search($id);
        view('sales', $order);
    }


    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $customars_id=$_POST["customars_id"];
            $order_total=$_POST["order_total"];
            $discount=$_POST["discount"];
            $shipping_address=$_POST["shipping_address"];
            $paid_amount=$_POST["paid_amount"];
            $status_id=$_POST["status_id"];
            $order_date=$_POST["order_date"];
            $delivery_date=$_POST["delivery_date"];
            $vat=$_POST["vat"];
            $uom_id=$_POST["uom_id"];

            $result = new Order($id, $customars_id, $order_total, $discount, $shipping_address, $paid_amount, $status_id, $order_date, $delivery_date, $vat, $uom_id);

            $result->update();
        }

        redirect("index");

    }

    function delete(){
        $id=$_GET["id"];
        $order = Order::search($id);
        view("sales", $order);
    }

    function delete_confirm(){
        if(isset($_POST["btnDelete"])){
            $id=$_POST["id"];
            Order::delete($id);
        }

        redirect("index");

    }


    function salesReport(){
        view("sales");
    }

    
    function views(){
        $id=$_GET["id"];
       $order = Order::search($id);
        view('sales', $order);
    }


}


?>