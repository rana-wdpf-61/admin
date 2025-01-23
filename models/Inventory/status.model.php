<?php

class Status{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id= $id;
        $this->name =$name;
    } 


    public function save(){
        global $db, $tx;

        $sql = $db->query("insert into `{$tx}status`(name)values('{$this->name}') ");

        return $sql;
    }


    public static function displayAll(){
        global $db, $tx, $base_url;

        $sql= $db->query("select * from  `{$tx}status`");

        $result=$sql->fetch_all();

        return $result;
    }



    public static function display(){
        global $db, $tx, $base_url;

        $sql= $db->query("select * from  `{$tx}status`");

        while($row=$sql->fetch_object()){

            $id=$row->id;
            $name=$row->name;

            echo "<tr class='align-middle'>
                <td>$id</td>
                <td>$name</td>
                <td> 
               <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/status/views/$id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/status/edit/$id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/status/delete/$id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
            </tr>";

        }
    }



    public static function search($id){
        global $db, $tx;

        $sql = $db->query("select * from `{$tx}status` where id='$id'");

        $result = $sql->fetch_object();

        return $result;
    }



    public static function delete($id){
        global $db, $tx;

        $sql = $db->query("delete from `{$tx}status` where id='$id'");

        return $sql;
      
    }



    public function update(){
        global $db, $tx;

        $sql = $db->query("update `{$tx}status` set name='{$this->name}' where id='{$this->id}'");

        return $sql;
    }


}




?>