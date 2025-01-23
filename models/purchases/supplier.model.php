<?php

class Supplier
{
  public $id;
  public $name;
  public $photo;
  public $phone;
  public $email;
  public $address;
  public $created_at;
  public $updated_at;
  

  public function __construct($id, $name, $photo, $phone, $email, $address)
  {
    $this->id = $id;
    $this->name = $name;
    $this->photo = $photo;
    $this->phone = $phone;
    $this->email = $email;
    $this->address = $address;
  }



  function save()
  {
    global $db, $base_url, $tx;
    $result = $db->query("insert into `{$tx}suppliers`(name,photo,phone,email,address)values('{$this->name}','{$this->photo}','{$this->phone}','{$this->email}','{$this->address}')");
    return $result;
  }




  static function displayAll()
  {
    global $db, $base_url, $tx;
    $sql = $db->query("select * from `{$tx}suppliers`");

    $result = $sql->fetch_all(MYSQLI_ASSOC);

    return $result;
  }


  public static function all()
  {
    global $db, $tx;
    $result = $db->query("select id,name,phone,email,address,photo,created_at,updated_at from {$tx}suppliers");
    $data = [];
    while ($supplier = $result->fetch_object()) {
      $data[] = $supplier;
    }
    return $data;
  }




  public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,phone,email,address,photo,created_at,updated_at from {$tx}suppliers where id='$id'");
		$supplier=$result->fetch_object();
			return $supplier;
	}



  static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}suppliers");
		$supplier =$result->fetch_object();
		return $supplier->last_id;
	}

  // static function pagination()
  // {
  //   global $db, $tx, $base_url, $limit;
  //   while ($row = $limit->fetch_object()) {
  //     echo "  <tr>
  //           <td>$row->id</td>
  //           <td>$row->name</td>
  //           <td><img class='rounded-circle' height='50' width='50' src='{$base_url}/img/$row->photo' alt=''></td>
  //           <td>$row->phone</td>
  //           <td>$row->email</td>
  //           <td>$row->address</td>
  //           <td>
  //             <div class='table-actions d-flex align-items-center gap-3 fs-6'>
  //               <a href='{$base_url}/supplier/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
  //               <a href='{$base_url}/supplier/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
  //               <a href='{$base_url}/supplier/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
  //             </div>
  //           </td>
  //           </tr>";
  //   }
  // }



  static function display()
  {
    global $db, $base_url, $tx;
    $result = $db->query("select * from `{$tx}suppliers`");

    while ($row = $result->fetch_object()) {
      echo "  <tr>
                <td>$row->id</td>
                <td>$row->name</td>
                <td><img class='rounded-circle' height='50' width='50' src='{$base_url}/img/$row->photo' alt=''></td>
                <td>$row->phone</td>
                <td>$row->email</td>
                <td>$row->address</td>
                <td>
                  <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/supplier/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/supplier/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/supplier/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
                </tr>";
    }

    return $result;
  }



  function update()
  {
    global $db, $tx;

    $result = $db->query("update `{$tx}suppliers` set name='{$this->name}', photo='{$this->photo}', phone='{$this->phone}', email='{$this->email}', address='{$this->address}' where id='{$this->id}'");

    return $result;
  }




  static function search($id)
  {
    global $db, $tx;
    $result = $db->query("select * from `{$tx}suppliers` where id='$id'");

    return $result->fetch_object();
  }




  static function delete($id)
  {
    global $db, $tx;
    $result = $db->query("delete from `{$tx}suppliers` where id='$id'");

    return $result;
  }



  static function html_select($name="cmbSupplier"){
		global $db,$tx;
		$html="<select id='$name' name='$name' class='form-select'> ";
		$result =$db->query("select id,name from {$tx}suppliers");
		while($supplier=$result->fetch_object()){
			$html.="<option value ='$supplier->id'>$supplier->name</option>";
		}
		$html.="</select>";
		return $html;
    
	}


  public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}suppliers $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}





}
