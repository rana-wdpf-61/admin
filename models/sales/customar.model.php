<?php
class Customar{
    public $id;
    public $name;
    public $photo;
    public $phone;
    public $email;
    public $address;
    public $created_at;
    public $updated_at;

    public function __construct($id, $name, $photo, $phone, $email,  $address)
    {
        $this->id=$id;
        $this->name=$name;
        $this->photo=$photo;
        $this->phone=$phone;
        $this->email=$email;
        $this->address=$address;
    }


    public function save(){
        global $db, $tx;

        $sql=$db->query("insert into `{$tx}customars`(name, photo, email, phone, address)values('{$this->name}','{$this->photo}', '{$this->phone}','{$this->email}','{$this->address}')");

        return $sql;
    }

    public static function display(){
        global $db,$tx, $base_url;

        $sql=$db->query("select * from `{$tx}customars`");

        while($row=$sql->fetch_object()){
            $id=$row->id;
            $name=$row->name;
            $photo=$row->photo;
            $phone=$row->phone;
            $email=$row->email;
            $address=$row->address;
            echo "<tr class='align-middle'>
                <td>$id</td>
                <td>$name</td>
                <td><img height='50' width='50' class='rounded-circle' src='$base_url/img/$photo' alt=''></td>
                <td>$phone</td>
                <td>$email</td>
                <td>$address</td>
                <td> 
                <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/customar/views/$id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/customar/edit/$id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/customar/delete/$id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
            </tr>";
        }

        return $sql;

    }


    public static function search($id){
        global $db,$tx;

        $sql=$db->query("select * from `{$tx}customars` where id='$id'");

        $result=$sql->fetch_object();

        return $result;
    }

    
    
    public static function delete($id){
        global $db,$tx;

        $sql=$db->query("delete from `{$tx}customars` where id='$id'");

        return $sql;
    }


    public function update(){
        global $db,$tx;

        $sql=$db->query("update `{$tx}customars` set name='{$this->name}',photo='{$this->photo}', phone='{$this->phone}', email='{$this->email}', address='{$this->address}' where id='{$this->id}'");

        return $sql;
    }



    public static function all()
    {
      global $db, $tx;
      $result = $db->query("select id,name,phone,email,address,photo,created_at,updated_at from {$tx}customars");
      $data = [];
      while ($customar = $result->fetch_object()) {
        $data[] = $customar;
      }
      return $data;
    }
  

    
  public static function find($id){
    global $db,$tx;
    $result =$db->query("select id,name,phone,email,address,photo,created_at,updated_at from {$tx}customars where id='$id'");
    $customar=$result->fetch_object();
        return $customar;
}


static function get_last_id(){
    global $db,$tx;
    $result =$db->query("select max(id) last_id from {$tx}customars");
    $customar =$result->fetch_object();
    return $customar->last_id;
}


static function html_select($name="cmbCustomar"){
    global $db,$tx;
    $html="<select id='$name' name='$name' class='form-select'> ";
    $result =$db->query("select id, name from {$tx}customars");
    while($customar=$result->fetch_object()){
        $html.="<option value ='$customar->id'>$customar->name</option>";
    }
    $html.="</select>";
    return $html;

}



public static function count($criteria=""){
    global $db,$tx;
    $result =$db->query("select count(*) from {$tx}customars $criteria");
    list($count)=$result->fetch_row();
        return $count;
}


}


?>



