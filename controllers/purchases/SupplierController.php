<?php
class SupplierController
{

    function index()
    {
        view("purchases");
    }



    function create()
    {
        view("purchases");
    }



    function save()
    {
        if (isset($_POST['btnSubmit'])) {
            $name = $_POST["name"];
            $photo = $_FILES["photo"]["name"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $supplier = new Supplier(null, $name, $photo, $phone, $email, $address);
            $result = $supplier->save();
        }
        redirect("index");
    }



    function edit()
    {
        $id = $_GET["id"];
        $supplier = Supplier::search($id);
        view("purchases", $supplier);
    }



    function update()
    {
        if (isset($_POST['btnUpdate'])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $photo = $_FILES["photo"]["name"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $supplier = new Supplier($id, $name, $photo, $phone, $email, $address);
            $result = $supplier->update();
        }
        redirect("index");
    }




    function delete()
    {
        $id = $_GET["id"];
        $supplier = Supplier::search($id);
        view("purchases", $supplier);
    }




    function delete_confirm()
    {
        if (isset($_POST['btnDelete'])) {
            $id = $_POST["id"];
            $result = Supplier::delete($id);
        }
        redirect("index");
    }




    function search()
    {
        view("purchases");
    }


    function views(){
        $id = $_GET["id"];
        $supplier = Supplier::search($id);

        view("purchases", $supplier);
    }

    // function search_id(){
    //     if(isset($_GET["search"])){
    //         $id=$_GET["id"];
    //         $result= Employee::search($id);
    //     }
    //     redirect("index");
    // }

}
