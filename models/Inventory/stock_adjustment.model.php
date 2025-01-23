<?php

class Stock_adjustment
{
    public $id;
    public $user_id;
    public $adjustment_type_id;
    public $warehouse_id;
    public $created_at;
    public $updated_at;

    public function __construct($id, $user_id, $adjustment_type_id, $warehouse_id)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->adjustment_type_id = $adjustment_type_id;
        $this->warehouse_id = $warehouse_id;
      
    }



    function save()
    {
        global $db, $base_url, $tx;
        $result = $db->query("insert into `{$tx}stock_adjustment`(user_id,adjustment_type_id,warehouse_id,qty,remark)values('{$this->user_id}','{$this->adjustment_type_id}','{$this->warehouse_id}')");
        return $result;
    }




    static function display()
    {
        global $db, $base_url, $tx;
        $result = $db->query("select * from `{$tx}stock_adjustment`");

        while ($row = $result->fetch_object()) {
            echo "  <tr>
                <td>$row->id</td>
                <td>$row->user_id</td>
                <td>$row->adjustment_type_id</td>
                <td>$row->warehouse_id</td>
                <td>
                  <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/stock_adjustment/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/stock_adjustment/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/stock_adjustment/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
                </tr>";
        }

        return $result;
    }

    function update()
    {
        global $db, $tx;

        $result = $db->query("update `{$tx}stock_adjustment` set user_id='{$this->user_id}', adjustment_type_id='{$this->adjustment_type_id}', warehouse_id='{$this->warehouse_id}' where id='{$this->id}'");

        return $result;
    }




    static function search($id)
    {
        global $db, $tx;
        $result = $db->query("select * from `{$tx}stock_adjustment` where id='$id'");

        return $result->fetch_object();
    }




    static function delete($id)
    {
        global $db, $tx;
        $result = $db->query("delete from `{$tx}stock_adjustment` where id='$id'");

        return $result;
    }
}

?>


