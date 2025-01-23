<?php
class Stock_adjustment_detailsController{
    function index(){
        view("inventory");
    }


    function create(){
        view("inventory");
    }

    function save(){
        if(isset($_POST["btnSubmit"])){
            $stock_adjustment_id=$_POST["stock_adjustment_id"];
            $products_id=$_POST["products_id"];
            $qty=$_POST["qty"];
            $price=$_POST["price"];

            $result = new Stock_adjustment_details(null, $stock_adjustment_id, $products_id, $qty,$price);
            $result->save();
        }

        redirect("index");
    }


    function edit(){
       $id=$_GET["id"];
       $stock_adjustment_details = Stock_adjustment_details::search($id);
       view('inventory', $stock_adjustment_details);
    }


    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $stock_adjustment_id=$_POST["stock_adjustment_id"];
            $products_id=$_POST["products_id"];
            $qty=$_POST["qty"];
            $price=$_POST["price"];

            $result = new Stock_adjustment_details($id, $stock_adjustment_id, $products_id, $qty,$price);

            $result->update();
        }

        redirect("index");

    }

    function delete(){
        $id=$_GET["id"];
        $stock_adjustment_details = Stock_adjustment_details::search($id);
        view("inventory", $stock_adjustment_details);
    }

    function delete_confirm(){
        if(isset($_POST["btnDelete"])){
            $id=$_POST["id"];
            Stock_adjustment_details::delete($id);
        }

        redirect("index");

    }


    function search(){
        view("inventory");
    }






}


?>