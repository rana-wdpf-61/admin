<?php

class Uom{
    public $id;
    public $name;
    public $created_at;
    public $updated_at;

    public function __construct($id, $name)
    {
        $this->id= $id;
        $this->name =$name;
    } 


    public function save(){
        global $db, $tx;

        $sql = $db->query("insert into `{$tx}uom`(name)values('{$this->name}') ");

        return $sql;
    }



    public static function displayAll(){
        global $db, $tx, $base_url;

        $sql= $db->query("select * from  `{$tx}uom`");

        $result=$sql->fetch_all();

        return $result;
    }




    public static function display(){
        global $db, $tx, $base_url;

        $sql= $db->query("select * from  `{$tx}uom`");

        while($row=$sql->fetch_object()){

            $id=$row->id;
            $name=$row->name;

            echo "<tr class='align-middle'>
                <td>$id</td>
                <td>$name</td>
                <td> 
               <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/uom/views/$id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/uom/edit/$id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/uom/delete/$id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
            </tr>";

        }
    }



    public static function search($id){
        global $db, $tx;

        $sql = $db->query("select * from `{$tx}uom` where id='$id'");

        $result = $sql->fetch_object();

        return $result;
    }



    public static function delete($id){
        global $db, $tx;

        $sql = $db->query("delete from `{$tx}uom` where id='$id'");

        return $sql;
      
    }



    public function update(){
        global $db, $tx;

        $sql = $db->query("update `{$tx}uom` set name='{$this->name}' where id='{$this->id}'");

        return $sql;
    }


    static function html_select($name = "cmbUom")
    {
        global $db, $tx;
        $html = "<select id='$name' name='$name' class='form-select'> ";
        $result = $db->query("select id,name from {$tx}uom");
        while ($uom = $result->fetch_object()) {
            $html .= "<option value ='$uom->id'>$uom->name</option>";
        }
        $html .= "</select>";
        return $html;
    }


    public static function all()
    {
        global $db, $tx;
        $result = $db->query("select id,name,created_at,updated_at from {$tx}uom");
        $data = [];
        while ($uom = $result->fetch_object()) {
            $data[] = $uom;
        }
        return $data;
    }


    public static function find($id)
    {
        global $db, $tx;
        $result = $db->query("select id,name,created_at,updated_at from {$tx}uom where id='$id'");
        $uom = $result->fetch_object();
        return $uom;
    }

    static function get_last_id()
    {
        global $db, $tx;
        $result = $db->query("select max(id) last_id from {$tx}uom");
        $uom = $result->fetch_object();
        return $uom->last_id;
    }



}






?>