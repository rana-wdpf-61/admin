<?php
class UserController{
    function index(){
        view("system");
    }


    function create(){
        view("system");
    }

    function save(){
        if(isset($_POST["btnSubmit"])){
            $name=$_POST["name"];
            $role_id=$_POST["role_id"];
            $password=$_POST["password"];
            $email=$_POST["email"];
            $full_name=$_POST["full_name"];
            $photo=$_FILES["photo"]["name"];
            $verify_code=$_POST["verify_code"];
            $inactive=$_POST["inactive"];
            $mobile=$_POST["mobile"];
            $ip=$_POST["ip"];
            $email_verified_at=$_POST["email_verified_at"];
            $remember_token=$_POST["remember_token"];

            $result = new User(null, $name, $role_id, $password, $email, $full_name, $photo, $verify_code, $inactive, $mobile, $ip, $email_verified_at, $remember_token);

            $result->save();
        }

        redirect("index");
    }


    function edit(){
        $id=$_GET["id"];
       $user = User::search($id);
        view('system', $user);
    }


    function update(){
        if(isset($_POST["btnUpdate"])){
            $id=$_POST["id"];
            $name=$_POST["name"];
            $role_id=$_POST["role_id"];
            $password=$_POST["password"];
            $email=$_POST["email"];
            $full_name=$_POST["full_name"];
            $photo=$_FILES["photo"]["name"];
            $verify_code=$_POST["verify_code"];
            $inactive=$_POST["inactive"];
            $mobile=$_POST["mobile"];
            $ip=$_POST["ip"];
            $email_verified_at=$_POST["email_verified_at"];
            $remember_token=$_POST["remember_token"];

            $result = new User($id, $name, $role_id, $password, $email, $full_name, $photo, $verify_code, $inactive, $mobile, $ip, $email_verified_at, $remember_token);

            $result->update();
        }

        redirect("index");

    }

    function delete(){
        $id=$_GET["id"];
        $user = User::search($id);
        view("system", $user);
    }

    function delete_confirm(){
        if(isset($_POST["btnDelete"])){
            $id=$_POST["id"];
            User::delete($id);
        }

        redirect("index");

    }


    function search(){
        view("system");
    }


}


?>