<?php
class manufacturerController{
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
            $email=$_POST["email"];
            $address=$_POST["address"];

            $result = new Manufacturer(null, $name,  $phone, $email, $address);
            $result->save();
        }

        redirect("index");
    }


    function edit(){
       $id=$_GET["id"];
       $manufacturer = Manufacturer::search($id);
       view('inventory', $manufacturer);
    }


    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $name=$_POST["name"];
            $phone=$_POST["phone"];
            $email=$_POST["email"];
            $address=$_POST["address"];

            $manufacturer = new Manufacturer($id, $name, $phone, $email,  $address);
           $result = $manufacturer->update();
        }

        redirect("index");

    }

    function delete(){
        $id=$_GET["id"];
        $manufacturer = Manufacturer::search($id);
        view("inventory", $manufacturer);
    }

    function delete_confirm(){
        if(isset($_POST["btnDelete"])){
            $id=$_POST["id"];
            Manufacturer::delete($id);
        }

        redirect("index");

    }


    function search(){
        view("inventory");
    }






}


?>