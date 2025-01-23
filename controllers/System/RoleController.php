<?php 
class RoleController{

    function index(){
        view("system");
    }

    function create(){
        view("system");
    }
    
    function save(){
        if (isset($_POST['create'])) {
           $name= $_POST["name"];

           $role= new Role(null, $name);
           $result = $role->save();
        }
       redirect("index");
    }

    function edit($id){
        //  $id=$_GET["id"];
        //  $role= Role::search($id);
        view("system", Role::search($id));
    }

    function update(){
        if (isset($_POST['update'])) {
            $name= $_POST["name"];
            $id= $_POST["id"];

            $role= new Role($id, $name);
            $result = $role->update();
         }
        redirect("index");
    }

    function delete(){
        $id=$_GET["id"];
        $role= Role::search($id);
       view("system",$role);
    }


    function confirm_delete(){
        if (isset($_POST['delete'])) {
            
            $id= $_POST["id"];
            $result = Role::delete($id);
         }
        redirect("index");
    }

    function search(){
        view("system");
    }

}

?>


