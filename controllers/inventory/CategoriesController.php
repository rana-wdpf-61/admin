<?php

class CategoriesController{

    function index(){
        view("inventory");
    }


    function create(){
        view("inventory");
    }

    function save(){
        if(isset($_POST["btnSubmit"])){
            $name=$_POST["name"];

            $categories= new Categories(null, $name);
            $categories->save();
        }

        redirect("index");
    }


    function edit(){
        $id=$_GET["id"];
        $categories=Categories::search($id);
        view("inventory", $categories);
    }

    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $name=$_POST["name"];

            $categories=new Categories($id, $name);
            $categories->update();
        }

        redirect("index");
    }


    function delete(){
        $id=$_GET["id"];
        $categories=Categories::search($id);
        view("inventory",$categories);
    }


    function delete_confirm(){
       if(isset($_POST["btnDelete"])){
        $id=$_POST["id"];
       Categories::delete($id);
       }
       
       redirect("index");
    }


    function search(){
        view("inventory");
    }


}



?>