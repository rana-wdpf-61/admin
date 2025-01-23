<?php
class Stock_adjustmentController{
    function index(){
        view("inventory");
    }


    function create(){
        view("inventory");
    }

    function save(){
        if(isset($_POST["btnSubmit"])){
            $user_id=$_POST["user_id"];
            $adjustment_type_id=$_POST["adjustment_type_id"];
            $warehouse_id=$_POST["warehouse_id"];

            $result = new Stock_adjustment(null, $user_id, $adjustment_type_id, $warehouse_id);
            $result->save();
        }

        redirect("index");
    }


    function edit(){
       $id=$_GET["id"];
       $stock_adjustment = Stock_adjustment::search($id);
       view('inventory', $stock_adjustment);
    }


    function update(){
        if(isset($_POST["btnUpdate"])){
                $id=$_POST["id"];
                $user_id=$_POST["user_id"];
                $adjustment_type_id=$_POST["adjustment_type_id"];
                $warehouse_id=$_POST["warehouse_id"];
    
                $result = new Stock_adjustment($id, $user_id, $adjustment_type_id, $warehouse_id);
                $result->update();
        }

        redirect("index");

    }

    function delete(){
        $id=$_GET["id"];
        $stock_adjustment = Stock_adjustment::search($id);
        view("inventory", $stock_adjustment);
    }

    function delete_confirm(){
        if(isset($_POST["btnDelete"])){
            $id=$_POST["id"];
            Stock_adjustment::delete($id);
        }

        redirect("index");

    }


    function search(){
        view("inventory");
    }






}


?>