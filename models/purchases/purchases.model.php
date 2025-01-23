<?php
class Purchases{
    public $id;
    public $supplier_id;
    public $product_id;
    public $status_id;
    public $order_total;
    public $paid_amount;
    public $discount;
    public $vat;
    public $delivery_date;
    public $date;
    public $shipping_address;
    public $description;
    public $created_at;
    public $updated_at;


    public function __construct($id, $supplier_id, $product_id, $status_id, $order_total, $paid_amount, $discount, $vat, $delivery_date, $date, $shipping_address, $description)
    {
        $this->id=$id;
        $this->supplier_id=$supplier_id;
        $this->product_id=$product_id;
        $this->status_id=$status_id;
        $this->order_total=$order_total;
        $this->paid_amount=$paid_amount;
        $this->discount=$discount;
        $this->vat=$vat;
        $this->delivery_date=$delivery_date;
        $this->date=$date;
        $this->shipping_address=$shipping_address;
        $this->description=$description;
    }


    
    public function save()
    {
        global $db, $base_url, $tx;

        $result = $db->query("insert into `{$tx}purchases`(supplier_id,product_id,status_id,order_total,paid_amount,discount,vat,delivery_date,date,shipping_address,description)values('{$this->supplier_id}','{$this->product_id}','{$this->status_id}','{$this->order_total}','{$this->paid_amount}','{$this->discount}','{$this->vat}','{$this->delivery_date}','{$this->date}','{$this->shipping_address}','{$this->description}')");

        return $db->insert_id;
    }


    static function displayAll()
    {
        global $db, $base_url, $tx;
        $sql = $db->query("select * from `{$tx}purchases`");

        $result=$sql->fetch_all(MYSQLI_ASSOC);

        return $result;
    }



    static function display()
    {
        global $db, $base_url, $tx;
        $result = $db->query("select * from `{$tx}purchases`");

        while ($row = $result->fetch_object()) {
            echo "  <tr>
                <td>$row->id</td>
                <td>$row->supplier_id</td>
                <td>$row->product_id</td>
                <td>$row->status_id</td>
                <td>$row->order_total</td>
                <td>$row->paid_amount</td>
                <td>$row->discount</td>
                <td>$row->vat</td>
                <td><img class='rounded-circle' height='50' width='50' src='{$base_url}/img/$row->delivery_date' alt=''></td>
                <td>$row->date</td>
                <td>$row->shipping_address</td>
                <td>$row->description</td>
                <td>
                  <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/purchases/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/purchases/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/purchases/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
                </tr>";
        }

        return $result;
    }

    function update()
    {
        global $db, $tx;

        $result = $db->query("update `{$tx}purchases` set supplier_id='{$this->supplier_id}', product_id='{$this->product_id}', status_id='{$this->status_id}', order_total='{$this->order_total}', paid_amount='{$this->paid_amount}' , discount='{$this->discount}' , vat='{$this->vat}' , delivery_date='{$this->delivery_date}' , date='{$this->date}' , shipping_address='{$this->shipping_address}' , description='{$this->description}' where id='{$this->id}'");

        return $result;
    }




    static function search($id)
    {
        global $db, $tx;
        $result = $db->query("select * from `{$tx}purchases` where id='$id'");

        return $result->fetch_object();
    }




    static function delete($id)
    {
        global $db, $tx;
        $result = $db->query("delete from `{$tx}purchases` where id='$id'");

        return $result;
    }



    static function html_select($name="cmbPurchase"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}purchases");
		while($purchases=$result->fetch_object()){
			$html.="<option value ='$purchases->id'>$purchases->name</option>";
		}
		$html.="</select>";
		return $html;
	}

    public static function all(){
		global $db,$tx;
		$result=$db->query("select id, supplier_id, product_id, status_id, order_total, paid_amount, discount, vat, delivery_date, date, shipping_address, description from {$tx}purchases");
		$data=[];
		while($purchases=$result->fetch_object()){
			$data[]=$purchases;
		}
			return $data;
	}


    public static function find($id){
		global $db,$tx;
		$result =$db->query("select id, supplier_id, product_id, status_id, order_total, paid_amount, discount, vat, delivery_date, date, shipping_address, description from {$tx}purchases where id='$id'");
		$purchases=$result->fetch_object();
			return $purchases;
	}


    static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}purchases");
		$purchases =$result->fetch_object();
		return $purchases->last_id;
	}


    public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}purchases $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}




}

?>