<?php
class WarehouseController{
    function index(){
        view("inventory");
    }


    function create(){
        view("inventory");
    }

    function save(){
        if(isset($_POST["btnSubmit"])){
            $name=$_POST["name"];
            $phone=$_POST["phone"];
            $location=$_POST["location"];
            $address=$_POST["address"];
    
            $result = new Warehouse(null, $name, $phone, $location, $address);
            $result->save();
        }

        redirect("index");
    }


    function edit(){
       $id=$_GET["id"];
       $warehouse = Warehouse::search($id);
       view('inventory', $warehouse);
    }


    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $name=$_POST["name"];
            $phone=$_POST["phone"];
            $location=$_POST["location"];
            $address=$_POST["address"];
    
            $result = new Warehouse($id, $name, $phone, $location, $address);
            $result->update();
        }

        redirect("index");

    }

    function delete(){
        $id=$_GET["id"];
        $warehouse = Warehouse::search($id);
        view("inventory", $warehouse);
    }

    function delete_confirm(){
        if(isset($_POST["btnDelete"])){
            $id=$_POST["id"];
            Warehouse::delete($id);
        }

        redirect("index");

    }


    function search(){
        view("inventory");
    }






}


?>