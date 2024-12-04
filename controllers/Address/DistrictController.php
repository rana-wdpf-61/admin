<?php

class DistrictController
{

    function index()
    {
        view('address');
    }

    // create 
    function create()
    {
        view('address');
    }
    function save(){

        if (isset($_POST["btnUpdate"])) {
           // $id= $_POST["id"];
            $name= $_POST["name"];
            $div_id= $_POST["division_id"];
            $photo= upload($_FILES["photo"], "img", $name) ;
            $dis= new District("",$name, $div_id, $photo);
            $dis->save();
           
        }
        redirect("index");

    }

    // update 
    function edit()
    {
        $id= $_GET['id'];
        $district= District::search($id);
        view('address', $district);
    }
    function update() {
       if (isset($_POST["btnUpdate"])) {
           $id= $_POST["id"];
           $name= $_POST["name"];
           $div_id= $_POST["division_id"];

           $dis= new District($id,$name, $div_id,"");
           $dis->update();
          
       }
       redirect("edit?id=$id");
    }


    // delete 
    function trash()
    {
        $id= $_GET['id'];
        $district= District::trash($id);
        redirect("index");
    }
    function confirm_delete() {}
}
