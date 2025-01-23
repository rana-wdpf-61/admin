<?php

class StatusController{

    function index(){
        view("inventory");
    }


    function create(){
        view("inventory");
    }

    function save(){
        if(isset($_POST["btnSubmit"])){
            $name=$_POST["name"];

            $status= new Status(null, $name);
            $status->save();
        }

        redirect("index");
    }


    function edit(){
        $id=$_GET["id"];
        $status=Status::search($id);
        view("inventory", $status);
    }

    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $name=$_POST["name"];

            $status=new Status($id, $name);
            $status->update();
        }

        redirect("index");
    }


    function delete(){
        $id=$_GET["id"];
        $status= Status::search($id);
        view("inventory",$status);
    }


    function delete_confirm(){
       if(isset($_POST["btnDelete"])){
        $id=$_POST["id"];
        Status::delete($id);
       }
       
       redirect("index");
    }


    function search(){
        view("inventory");
    }


}



?>