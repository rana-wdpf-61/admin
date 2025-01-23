<?php
class StockController{
    function index(){
        view("inventory");
    }


    function create(){
        view("inventory");
    }

    function save(){
        if(isset($_POST["btnSubmit"])){
            $product_id=$_POST["product_id"];
            $transaction_type_id=$_POST["transaction_type_id"];
            $warehouse_id=$_POST["warehouse_id"];
            $qty=$_POST["qty"];
            $remark=$_POST["remark"];

            $result = new Stock(null, $product_id, $transaction_type_id, $warehouse_id, $qty, $remark);
            $result->save();
        }

        redirect("index");
    }


    function edit(){
       $id=$_GET["id"];
       $stock = Stock::search($id);
       view('inventory', $stock);
    }


    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $product_id=$_POST["product_id"];
            $transaction_type_id=$_POST["transaction_type_id"];
            $warehouse_id=$_POST["warehouse_id"];
            $qty=$_POST["qty"];
            $remark=$_POST["remark"];

            $result = new Stock($id, $product_id, $transaction_type_id, $warehouse_id, $qty, $remark);
            $result->update();
        }

        redirect("index");

    }

    function delete(){
        $id=$_GET["id"];
        $stock = Stock::search($id);
        view("inventory", $stock);
    }

    function delete_confirm(){
        if(isset($_POST["btnDelete"])){
            $id=$_POST["id"];
            Stock::delete($id);
        }

        redirect("index");

    }


    function search(){
        view("inventory");
    }






}


?>