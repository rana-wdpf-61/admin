<?php

class Warehouse
{
    public $id;
    public $name;
    public $phone;
    public $location;
    public $address;
    public $created_at;
    public $updated_at;

    public function __construct($id, $name, $phone, $location, $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->location = $location;
        $this->address = $address;
    }



    function save()
    {
        global $db, $base_url, $tx;
        $result = $db->query("insert into `{$tx}warehouse`(name,phone,location,address)values('{$this->name}','{$this->phone}','{$this->location}','{$this->address}')");
        return $result;
    }



    static function displayAll()
    {
        global $db, $base_url, $tx;
        $sql = $db->query("select * from `{$tx}warehouse`");

        $result=$sql->fetch_all();

        return $result;
    }





    static function display()
    {
        global $db, $base_url, $tx;
        $result = $db->query("select * from `{$tx}warehouse`");

        while ($row = $result->fetch_object()) {
            echo "  <tr>
                <td>$row->id</td>
                <td>$row->name</td>
                <td>$row->phone</td>
                <td>$row->location</td>
                <td>$row->address</td>
                <td>
                  <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/warehouse/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/warehouse/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/warehouse/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
                </tr>";
        }

        return $result;
    }

    function update()
    {
        global $db, $tx;

        $result = $db->query("update `{$tx}warehouse` set name='{$this->name}', phone='{$this->phone}', location='{$this->location}', address='{$this->address}' where id='{$this->id}'");

        return $result;
    }




    static function search($id)
    {
        global $db, $tx;
        $result = $db->query("select * from `{$tx}warehouse` where id='$id'");

        return $result->fetch_object();
    }




    static function delete($id)
    {
        global $db, $tx;
        $result = $db->query("delete from `{$tx}warehouse` where id='$id'");

        return $result;
    }


    static function html_select($name="cmbWarehouse"){
		global $db,$tx;
		$html="<select id='$name' name='$name' class='form-select'> ";
		$result =$db->query("select id,name from {$tx}warehouse");
		while($warehouse=$result->fetch_object()){
			$html.="<option value ='$warehouse->id'>$warehouse->name</option>";
		}
		$html.="</select>";
		return $html;
	}

    
  static function get_last_id(){
    global $db,$tx;
    $result =$db->query("select max(id) last_id from {$tx}warehouse");
    $warehouse =$result->fetch_object();
    return $warehouse->last_id;
}


public static function find($id){
    global $db,$tx;
    $result =$db->query("select id,name,phone,location,address,created_at,updated_at from {$tx}warehouse where id='$id'");
    $warehouse=$result->fetch_object();
        return $warehouse;
}


public static function all()
{
  global $db, $tx;
  $result = $db->query("select id,name,phone,location,address,created_at, updated_at from {$tx}warehouse");
  $data = [];
  while ($warehouse = $result->fetch_object()) {
    $data[] = $warehouse;
  }
  return $data;
}


}

?>


