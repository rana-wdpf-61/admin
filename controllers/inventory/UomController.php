<?php

class UomController{

    function index(){
        view("inventory");
    }


    function create(){
        view("inventory");
    }

    function save(){
        if(isset($_POST["btnSubmit"])){
            $name=$_POST["name"];

            $uom= new Uom(null, $name);
            $uom->save();
        }

        redirect("index");
    }


    function edit(){
        $id=$_GET["id"];
        $uom=Uom::search($id);
        view("inventory", $uom);
    }

    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $name=$_POST["name"];

            $uom=new Uom($id, $name);
            $uom->update();
        }

        redirect("index");
    }


    function delete(){
        $id=$_GET["id"];
        $uom=Uom::search($id);
        view("inventory",$uom);
    }


    function delete_confirm(){
       if(isset($_POST["btnDelete"])){
        $id=$_POST["id"];
        Uom::delete($id);
       }
       
       redirect("index");
    }


    function search(){
        view("inventory");
    }


}



?>