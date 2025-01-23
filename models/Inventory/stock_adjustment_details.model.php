<?php

class Stock_adjustment_details
{
    public $id;
    public $stock_adjustment_id;
    public $products_id;
    public $qty;
    public $price;
    public $created_at;
    public $updated_at;

    public function __construct($id, $stock_adjustment_id, $products_id, $qty, $price)
    {
        $this->id = $id;
        $this->stock_adjustment_id = $stock_adjustment_id;
        $this->products_id = $products_id;
        $this->qty = $qty;
        $this->price = $price;
    }



    function save()
    {
        global $db, $base_url, $tx;

        $result = $db->query("insert into `{$tx}stock_adjustment_details`(stock_adjustment_id,products_id, qty, price)values('{$this->stock_adjustment_id}','{$this->products_id}','{$this->qty}','{$this->price}')");

        return $result;
    }




    static function display()
    {
        global $db, $base_url, $tx;
        $result = $db->query("select * from `{$tx}stock_adjustment_details`");

        while ($row = $result->fetch_object()) {
            echo "  <tr>
                <td>$row->id</td>
                <td>$row->stock_adjustment_id</td>
                <td>$row->products_id</td>
                <td>$row->qty</td>
                <td>$row->price</td>
                <td>
                  <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/stock_adjustment_details/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/stock_adjustment_details/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/stock_adjustment_details/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
                </tr>";
        }

        return $result;
    }

    function update()
    {
        global $db, $tx;

        $result = $db->query("update `{$tx}stock_adjustment_details` set stock_adjustment_id='{$this->stock_adjustment_id}', products_id='{$this->products_id}', qty='{$this->qty}', price='{$this->price}' where id='{$this->id}'");

        return $result;
    }




    static function search($id)
    {
        global $db, $tx;
        $result = $db->query("select * from `{$tx}stock_adjustment_details` where id='$id'");

        return $result->fetch_object();
    }




    static function delete($id)
    {
        global $db, $tx;
        $result = $db->query("delete from `{$tx}stock_adjustment_details` where id='$id'");

        return $result;
    }
}

?>


