<?php

class Transaction_typeController{

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

            $transaction_type= new Transaction_type(null, $name, $factor);
            $transaction_type->save();
        }

        redirect("index");
    }


    function edit(){
        $id=$_GET["id"];
        $transaction_type=Transaction_type::search($id);
        view("inventory", $transaction_type);
    }

    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $name=$_POST["name"];
            $factor=$_POST["factor"];

            $transaction_type=new Transaction_type($id, $name,$factor);
            $transaction_type->update();
        }

        redirect("index");
    }


    function delete(){
        $id=$_GET["id"];
        $transaction_type=Transaction_type::search($id);
        view("inventory",$transaction_type);
    }


    function delete_confirm(){
       if(isset($_POST["btnDelete"])){
        $id=$_POST["id"];
        Transaction_type::delete($id);
       }
       
       redirect("index");
    }


    function search(){
        view("inventory");
    }


}



?>