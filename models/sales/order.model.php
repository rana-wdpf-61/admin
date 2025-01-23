<?php
class Order{
    public $id;
    public $customar_id;
    public $order_total;
    public $discount;
    public $shipping_address;
    public $paid_amount;
    public $status_id;
    public $order_date;
    public $delivery_date;
    public $vat;
    public $uom_id;
    public $created_at;
    public $updated_at;

    public function __construct($id, $customar_id, $order_total, $discount, $shipping_address, $paid_amount, $status_id, $order_date, $delivery_date, $vat, $uom_id)
    {
        $this->id=$id;
        $this->customar_id=$customar_id;
        $this->order_total=$order_total;
        $this->discount=$discount;
        $this->shipping_address=$shipping_address;
        $this->paid_amount=$paid_amount;
        $this->status_id=$status_id;
        $this->order_date=$order_date;
        $this->delivery_date=$delivery_date;
        $this->vat=$vat;
        $this->uom_id=$uom_id;
    }


    public function save(){
        global $db, $tx;

        $sql=$db->query("insert into `{$tx}orders`(customar_id, order_total,discount,shipping_address, paid_amount, status_id, order_date, delivery_date, vat, uom_id)values('{$this->customar_id}','{$this->order_total}', '{$this->discount}','{$this->shipping_address}','{$this->paid_amount}','{$this->status_id}','{$this->order_date}','{$this->delivery_date}','{$this->vat}','{$this->uom_id}')");

        return $db->insert_id;
    }


    public static function displayAll(){
        global $db,$tx, $base_url;

        $sql=$db->query("select * from `{$tx}orders`");

        $result = $sql->fetch_all();

        return $result;
    }




    public static function display(){
        global $db,$tx, $base_url;

        $sql=$db->query("select * from `{$tx}orders`");

        while($row=$sql->fetch_object()){

            echo "<tr class='align-middle'>
                <td>$row->id</td>
                <td>$row->customar_id</td>
                <td>$row->order_total</td>
                <td>$row->uom_id</td>
                <td>$row->discount</td>
                <td>$row->vat</td>
                <td>$row->paid_amount</td>
                <td>$row->status_id</td>
                <td>$row->order_date</td>
                <td>$row->delivery_date</td>
                <td>$row->shipping_address</td>
            
                <td> 
                <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/order/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/order/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/order/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
            </tr>";
        }

        return $sql;

    }


    public static function search($id){
        global $db,$tx;

        $sql=$db->query("select * from `{$tx}orders` where id='$id'");

        $result=$sql->fetch_object();

        return $result;
    }

    
    
    public static function delete($id){
        global $db,$tx;

        $sql=$db->query("delete from `{$tx}orders` where id='$id'");

        return $sql;
    }


    public function update(){
        global $db,$tx;

        $sql=$db->query("update `{$tx}orders` set customar_id='{$this->customar_id}',order_total='{$this->order_total}', discount='{$this->discount}', shipping_address='{$this->shipping_address}', paid_amount='{$this->paid_amount}', status_id='{$this->status_id}', order_date='{$this->order_date}', delivery_date='{$this->delivery_date}', vat='{$this->vat}', uom_id='{$this->uom_id}' where id='{$this->id}'");

        return $sql;
    }
   


    public static function all(){
        global $tx, $db;

        $result=$db->query("select id, customar_id, order_total,discount,shipping_address, paid_amount,status_id , order_date , delivery_date,vat , uom_id,created_at,updated_at from {$tx}orders");

        $data=[];

        while ($order=$result->fetch_object()){
            $data[] = $order;
        }

        return $data;
    }

    public static function find($id){
        global $db,$tx;
        $result =$db->query("select id, customar_id, order_total,discount,shipping_address, paid_amount,status_id , order_date , delivery_date,vat , uom_id, created_at,updated_at from {$tx}orders where id='$id'");
        $order=$result->fetch_object();
            return $order;
    }


    static function get_last_id(){
        global $db,$tx;
        $result =$db->query("select max(id) last_id from {$tx}orders");
        $order =$result->fetch_object();
        return $order->last_id;
    }
    
    
    static function html_select($name="cmbOrder"){
        global $db,$tx;
        $html="<select id='$name' name='$name' class='form-select'> ";
        $result =$db->query("select id, name from {$tx}orders");
        while($order=$result->fetch_object()){
            $html.="<option value ='$order->id'>$order->name</option>";
        }
        $html.="</select>";
        return $html;
    
    }



    public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}orders $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}



}


?>



