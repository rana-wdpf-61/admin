<?php
class Order_detailsController{
    function index(){
        view("sales");
    }


    function create(){
        view("sales");
    }

    function save(){
        if(isset($_POST["btnSubmit"])){
            $order_id=$_POST["order_id"];
            $product_id=$_POST["product_id"];
            $qty=$_POST["qty"];
            $price=$_POST["price"];
            $unit_price=$_POST["unit_price"];
            $discount=$_POST["discount"];
            $vat=$_POST["vat"];
            $uom_id=$_POST["uom_id"];

            $result = new Order_details(null, $order_id, $product_id, $qty, $price,$unit_price, $discount, $vat, $uom_id);
            $result->save();
        }

        redirect("index");
    }


    function edit(){
        $id=$_GET["id"];
       $order_details = Order_details::search($id);
        view('sales', $order_details);
    }


    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $order_id=$_POST["order_id"];
            $product_id=$_POST["product_id"];
            $qty=$_POST["qty"];
            $price=$_POST["price"];
            $unit_price=$_POST["unit_price"];
            $discount=$_POST["discount"];
            $vat=$_POST["vat"];
            $uom_id=$_POST["uom_id"];

            $result = new Order_details($id, $order_id, $product_id, $qty, $price,$unit_price,$unit_price, $discount, $vat, $uom_id);
            $result->update();
        }

        redirect("index");

    }

    function delete(){
        $id=$_GET["id"];
        $order_details = Order_details::search($id);
        view("sales", $order_details);
    }

    function delete_confirm(){
        if(isset($_POST["btnDelete"])){
            $id=$_POST["id"];
            Order_details::delete($id);
        }

        redirect("index");

    }


    function search(){
        view("sales");
    }


}


?>