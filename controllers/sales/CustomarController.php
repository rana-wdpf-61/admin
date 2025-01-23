<?php
class CustomarController{
    function index(){
        view("sales");
    }


    function create(){
        view("sales");
    }

    function save(){
        if(isset($_POST["btnSubmit"])){
            $name=$_POST["name"];
            $photo = $_FILES["photo"]["name"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $address=$_POST["address"];

            $result = new Customar(null, $name, $photo, $email, $phone, $address);
            $result->save();
        }

        redirect("index");
    }


    function edit(){
        $id=$_GET["id"];
       $customar = Customar::search($id);
        view('sales', $customar);
    }


    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $name=$_POST["name"];
            $photo = $_FILES["photo"]["name"];
            $phone=$_POST["phone"];
            $email=$_POST["email"];
            $address=$_POST["address"];

            $customar = new Customar($id, $name, $photo, $phone, $email,  $address);
            $result = $customar->update();
        }

        redirect("index");

    }

    function delete(){
        $id=$_GET["id"];
        $customar = Customar::search($id);
        view("sales", $customar);
    }

    function delete_confirm(){
        if(isset($_POST["btnDelete"])){
            $id=$_POST["id"];
           Customar::delete($id);
        }

        redirect("index");

    }


    function search(){
        view("sales");
    }


}


?>