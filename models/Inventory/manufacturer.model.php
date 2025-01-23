<?php
class Manufacturer
{
    public $id;
    public $name;
    public $phone;
    public $email;
    public $address;
    public $created_at;
    public $updated_at;

    public function __construct($id, $name, $phone, $email, $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
    }


    public function save()
    {
        global $db, $tx;

        $sql = $db->query("insert into `{$tx}manufacturers` (name, phone, email,  address)values('{$this->name}','{$this->phone}','{$this->email}','{$this->address}')");

        return $sql;
    }


    
    public static function displayAll()
    {
        global $db, $tx, $base_url;

        $sql = $db->query("select * from `{$tx}manufacturers`");

        $result=$sql->fetch_all();

        return $result;
    }



    public static function display()
    {
        global $db, $tx, $base_url;

        $sql = $db->query("select * from `{$tx}manufacturers`");

        while ($row = $sql->fetch_object()) {
            $id = $row->id;
            $name = $row->name;
            $phone = $row->phone;
            $email = $row->email;
            $address = $row->address;
            echo " <tr class='align-middle'>
                <td>$id</td>
                <td>$name</td>
                <td>$phone</td>
                <td>$email</td>
                <td>$address</td>
                <td> 
               <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/manufacturer/views/$id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/manufacturer/edit/$id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/manufacturer/delete/$id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
            </tr>";
        }

        return $sql;
    }


    public static function search($id)
    {
        global $db, $tx;

        $sql = $db->query("select * from `{$tx}manufacturers` where id='$id'");

        $result = $sql->fetch_object();

        return $result;
    }



    public static function delete($id)
    {
        global $db, $tx;

        $sql = $db->query("delete from `{$tx}manufacturers` where id='$id'");

        return $sql;
    }


    public function update()
    {
        global $db, $tx;

        $sql = $db->query("update `{$tx}manufacturers` set name='{$this->name}', phone='{$this->phone}', email='{$this->email}', address='{$this->address}' where id='{$this->id}'");

        return $sql;
    }
}
