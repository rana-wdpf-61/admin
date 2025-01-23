<?php
class Purchases_detailsController
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
            $purchases_id = $_POST["purchases_id"];
            $product_id = $_POST["product_id"];
            $qty = $_POST["qty"];
            $price = $_POST["price"];
            $vat = $_POST["vat"];
            $discount = $_POST["discount"];

            $purchases_details = new Purchases_details(null, $purchases_id, $product_id, $qty, $price, $vat, $discount);

            $result = $purchases_details->save();
        }

        redirect("index");
    }





    function edit()
    {
        $id = $_GET["id"];
        $purchases_details = Purchases_details::search($id);
        view("purchases", $purchases_details);
    }



    function update()
    {
        if (isset($_POST['btnUpdate'])) {
            $id = $_POST["id"];
            $purchases_id = $_POST["purchases_id"];
            $product_id = $_POST["product_id"];
            $qty = $_POST["qty"];
            $price = $_POST["price"];
            $vat = $_POST["vat"];
            $discount = $_POST["discount"];

            $purchases_details = new Purchases_details($id, $purchases_id, $product_id, $qty, $price, $vat, $discount);

            $result = $purchases_details->update();
        }

        redirect("index");
    }




    function delete()
    {
        $id = $_GET["id"];
        $purchases_details = Purchases_details::search($id);
        view("purchases", $purchases_details);
    }




    function delete_confirm()
    {
        if (isset($_POST['btnDelete'])) {
            $id = $_POST["id"];
            $result = Purchases_details::delete($id);
        }
        redirect("index");
    }




    function search()
    {
        view("purchases");
    }


    function views(){
        $id = $_GET["id"];
        $purchases_details = Purchases_details::search($id);

        view("purchases", $purchases_details);
    }

    // function search_id(){
    //     if(isset($_GET["search"])){
    //         $id=$_GET["id"];
    //         $result= Employee::search($id);
    //     }
    //     redirect("index");
    // }

}
