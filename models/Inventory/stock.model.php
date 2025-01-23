<?php

class Stock
{
    public $id;
    public $product_id;
    public $transaction_type_id;
    public $warehouse_id;
    public $qty;
    public $remark;
    public $created_at;
    public $updated_at;

    public function __construct($id, $product_id, $transaction_type_id, $warehouse_id, $qty, $remark)
    {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->transaction_type_id = $transaction_type_id;
        $this->warehouse_id = $warehouse_id;
        $this->qty = $qty;
        $this->remark = $remark;
    }



    function save()
    {
        global $db, $base_url, $tx;
        $result = $db->query("insert into `{$tx}stock`(product_id,transaction_type_id,warehouse_id,qty,remark)values('{$this->product_id}','{$this->transaction_type_id}','{$this->warehouse_id}','{$this->qty}','{$this->remark}')");
        return $result;
    }




    static function display()
    {
        global $db, $base_url, $tx;
        $result = $db->query("select * from `{$tx}stock`");

        while ($row = $result->fetch_object()) {
            echo "  <tr>
                <td>$row->id</td>
                <td>$row->product_id</td>
                <td>$row->transaction_type_id</td>
                <td>$row->warehouse_id</td>
                <td>$row->qty</td>
                <td>$row->remark</td>
                <td>
                  <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/stock/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/stock/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/stock/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
                </tr>";
        }

        return $result;
    }

    function update()
    {
        global $db, $tx;

        $result = $db->query("update `{$tx}stock` set product_id='{$this->product_id}', transaction_type_id='{$this->transaction_type_id}', warehouse_id='{$this->warehouse_id}', qty='{$this->qty}', remark='{$this->remark}' where id='{$this->id}'");

        return $result;
    }




    static function search($id)
    {
        global $db, $tx;
        $result = $db->query("select * from `{$tx}stock` where id='$id'");

        return $result->fetch_object();
    }




    static function delete($id)
    {
        global $db, $tx;
        $result = $db->query("delete from `{$tx}stock` where id='$id'");

        return $result;
    }


    public static function find($id){
		global $db,$tx;
		$result =$db->query("select $id,product_id, transaction_type_id, warehouse_id, qty, remark created_at,updated_at from {$tx}stock where id='$id'");
		$stock=$result->fetch_object();
			return $stock;
	}



    public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}stock $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}


    
    public static function count_product($criteria=""){
		global $db,$tx;
		$result =$db->query("select sum(qty) from {$tx}stock $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}






}

?>


