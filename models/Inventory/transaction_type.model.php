<?php

class Transaction_type{
    public $id;
    public $name;
    public $factor;
    public $created_at;
    public $updated_at;

    public function __construct($id, $name, $factor)
    {
        $this->id= $id;
        $this->name =$name;
        $this->factor =$factor;
    } 


    public function save(){
        global $db, $tx;

        $sql = $db->query("insert into `{$tx}transaction_type`(name,factor)values('{$this->name}','{$this->factor}') ");

        return $sql;
    }



    
    public static function displayAll(){
        global $db, $tx, $base_url;

        $sql= $db->query("select * from  `{$tx}transaction_type`");

        $result=$sql->fetch_all();

        return $result;
    }



    public static function display(){
        global $db, $tx, $base_url;

        $sql= $db->query("select * from  `{$tx}transaction_type`");

        while($row=$sql->fetch_object()){

            $id=$row->id;
            $name=$row->name;
            $factor=$row->factor;

            echo "<tr class='align-middle'>
                <td>$id</td>
                <td>$name</td>
                <td>$factor</td>
                <td> 
               <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/transaction_type/views/$id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/transaction_type/edit/$id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/transaction_type/delete/$id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
            </tr>";

        }
    }



    public static function search($id){
        global $db, $tx;

        $sql = $db->query("select * from `{$tx}transaction_type` where id='$id'");

        $result = $sql->fetch_object();

        return $result;
    }



    public static function delete($id){
        global $db, $tx;

        $sql = $db->query("delete from `{$tx}transaction_type` where id='$id'");

        return $sql;
      
    }



    public function update(){
        global $db, $tx;

        $sql = $db->query("update `{$tx}transaction_type` set name='{$this->name}',factor='{$this->factor}' where id='{$this->id}'");

        return $sql;
    }


}




?>