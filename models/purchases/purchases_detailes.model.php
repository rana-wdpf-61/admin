<?php

class Purchases_details
{
    public $id;
    public $purchases_id;
    public $product_id;
    public $qty;
    public $price;
    public $vat;
    public $discount;
    public $created_at;
    public $updated_at;

    public function __construct($id, $purchases_id,$product_id, $qty, $price,$vat,$discount)
    {
        $this->id = $id;
        $this->purchases_id = $purchases_id;
        $this->product_id = $product_id;
        $this->qty = $qty;
        $this->price = $price;
        $this->vat = $vat;
        $this->discount =$discount;
    }



    function save()
    {
        global $db, $base_url, $tx;
        
        $result = $db->query("insert into `{$tx}purchases_details`(purchases_id,product_id,qty,price,vat,discount)values('{$this->purchases_id}','{$this->product_id}','{$this->qty}','{$this->price}','{$this->vat}','{$this->discount}')");

        return $result;
    }




    static function display()
    {
        global $db, $base_url, $tx;
        $result = $db->query("select * from `{$tx}purchases_details`");

        while ($row = $result->fetch_object()) {
            echo "  <tr>
                <td>$row->id</td>
                <td>$row->purchases_id</td>
                <td>$row->product_id</td>
                <td>$row->qty</td>
                <td>$row->price</td>
                <td>$row->vat</td>
                <td>$row->discount</td>
                <td>
                  <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/purchases_details/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/purchases_details/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/purchases_details/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
                </tr>";
        }

        return $result;
    }

    function update()
    {
        global $db, $tx;

        $result = $db->query("update `{$tx}purchases_details` set purchases_id='{$this->purchases_id}', product_id='{$this->product_id}', qty='{$this->qty}', price='{$this->price}', vat='{$this->vat}', discount='{$this->discount}' where id='{$this->id}'");

        return $result;
    }




    static function search($id)
    {
        global $db, $tx;
        $result = $db->query("select * from `{$tx}purchases_details` where id='$id'");

        return $result->fetch_object();
    }




    static function delete($id)
    {
        global $db, $tx;
        $result = $db->query("delete from `{$tx}purchases_details` where id='$id'");

        return $result;
    }


    public static function all(){
		global $db,$tx;
		$result=$db->query("select id,purchases_id,product_id,qty,price, vat,discount,created_at,updated_at from {$tx}purchases_details");
		$data=[];
		while($purchasesdetail=$result->fetch_object()){
			$data[]=$purchasesdetail;
		}
			return $data;
	}



    public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,purchases_id,product_id,qty,price,vat,discount,created_at,updated_at from {$tx}purchases_details where id='$id'");
		$purchasesdetail=$result->fetch_object();
			return $purchasesdetail;
	}


    public static function find_all($id){
		global $db,$tx;
		$result =$db->query("select id,purchases_id,product_id,qty,price,vat,discount,created_at,updated_at from {$tx}purchases_details where purchases_id='$id'");
		$purchasesdetail=$result->fetch_all(MYSQLI_ASSOC);
			return $purchasesdetail;
	}



    static function html_select($name="cmbPurchasesDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}purchases_details");
		while($purchasesdetail=$result->fetch_object()){
			$html.="<option value ='$purchasesdetail->id'>$purchasesdetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}



    static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}purchases_details");
		$purchasesdetail =$result->fetch_object();
		return $purchasesdetail->last_id;
	}



    
}

?>

