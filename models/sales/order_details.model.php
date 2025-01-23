<?php
class Order_details{
    public $id;
    public $order_id;
    public $product_id;
    public $qty;
    public $price;
    public $unit_price;
    public $discount;
    public $vat;
    public $uom_id;
    public $created_at;
    public $updated_at;

    public function __construct($id, $order_id, $product_id, $qty, $price,$unit_price, $discount, $vat, $uom_id)
    {
        $this->id=$id;
        $this->order_id=$order_id;
        $this->product_id=$product_id;
        $this->qty=$qty;
        $this->price=$price;
        $this->unit_price=$unit_price;
        $this->discount=$discount;
        $this->vat=$vat;
        $this->uom_id=$uom_id;
    }


    public function save(){
        global $db, $tx;

        $sql=$db->query("insert into `{$tx}order_details`(order_id, product_id,qty,unit_price,price, discount, vat, uom_id)values('{$this->order_id}','{$this->product_id}', '{$this->qty}','{$this->price}','{$this->unit_price}', '{$this->discount}','{$this->vat}','{$this->uom_id}')");

        return $sql;
    }

    public static function display(){
        global $db,$tx, $base_url;

        $sql=$db->query("select core_order_details.*, core_orders.order_total, core_products.name as product, core_uom.name as uom from core_order_details
       left join core_orders on core_order_details.order_id = core_orders.id
       left join core_products on core_order_details.product_id = core_products.id
       left join core_uom on core_order_details.uom_id = core_uom.id;");

        while($row=$sql->fetch_object()){

            echo "<tr class='align-middle'>
                <td>$row->id</td>
                <td>$row->product</td>
                <td>$row->unit_price</td>
                <td>$row->price</td>
                <td>$row->discount</td>
                <td>$row->qty</td>
                <td>$row->uom</td>
                <td>$row->vat</td>
            
                <td> 
                <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/order_details/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/order_details/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/order_details/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
            </tr>";
        }

        return $sql;

    }


    public static function search($id){
        global $db,$tx;

        $sql=$db->query("select * from `{$tx}order_details` where id='$id'");

        $result=$sql->fetch_object();

        return $result;
    }

    
    
    public static function delete($id){
        global $db,$tx;

        $sql=$db->query("delete from `{$tx}order_details` where id='$id'");

        return $sql;
    }


    public function update(){
        global $db,$tx;

        $sql=$db->query("update `{$tx}order_details` set order_id='{$this->order_id}',product_id='{$this->product_id}', qty='{$this->qty}', price='{$this->price}',unit_price='{$this->unit_price}',  discount='{$this->discount}', vat='{$this->vat}', uom_id='{$this->uom_id}' where id='{$this->id}'");

        return $sql;
    }


    public static function all(){
        global $tx, $db;

        $result=$db->query("select id, order_id, product_id, qty, price,unit_price,discount, vat,uom_id, created_at,updated_at from {$tx}order_details");

        $data=[];

        while ($order_details=$result->fetch_object()){
            $data[] = $order_details;
        }

        return $data;
    }



   
    static function get_last_id(){
        global $db,$tx;
        $result =$db->query("select max(id) last_id from {$tx}order_details");
        $order_details =$result->fetch_object();
        return $order_details->last_id;
    }

    public static function find($id){
        global $db,$tx;
        $result =$db->query("select id, order_id, product_id,qty,price,unit_price, discount, vat,uom_id, created_at,updated_at from {$tx}order_details where id='$id'");
        $order_details=$result->fetch_object();
            return $order_details;
    }



    public static function find_all($id){
		global $db,$tx;
		$result =$db->query("select id, order_id, product_id,qty,price,unit_price, discount, vat,uom_id, created_at,updated_at from {$tx}order_details where order_id='$id'");
		$order_details=$result->fetch_all(MYSQLI_ASSOC);
			return $order_details;
	}





    static function html_select($name="cmbOrder_details"){
        global $db,$tx;
        $html="<select id='$name' name='$name' class='form-select'> ";
        $result =$db->query("select id, name from {$tx}order_details");
        while($order_details=$result->fetch_object()){
            $html.="<option value ='$order_details->id'>$order_details->name</option>";
        }
        $html.="</select>";
        return $html;
    
    }


}


?>



