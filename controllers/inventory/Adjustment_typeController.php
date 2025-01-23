<?php

class Adjustment_typeController{

    function index(){
        view("inventory");
    }


    function create(){
        view("inventory");
    }

    function save(){
        if(isset($_POST["btnSubmit"])){
            $name=$_POST["name"];
            $factor=$_POST["factor"];

            $adjustment_type= new Adjustment_type(null, $name, $factor);
            $adjustment_type->save();
        }

        redirect("index");
    }


    function edit(){
        $id=$_GET["id"];
        $adjustment_type=Adjustment_type::search($id);
        view("inventory", $adjustment_type);
    }

    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $name=$_POST["name"];
            $factor=$_POST["factor"];

            $adjustment_type=new Adjustment_type($id, $name,$factor);
            $adjustment_type->update();
        }

        redirect("index");
    }


    function delete(){
        $id=$_GET["id"];
        $adjustment_type=Adjustment_type::search($id);
        view("inventory",$adjustment_type);
    }


    function delete_confirm(){
       if(isset($_POST["btnDelete"])){
        $id=$_POST["id"];
        Adjustment_type::delete($id);
       }
       
       redirect("index");
    }


    function search(){
        view("inventory");
    }


}



?>