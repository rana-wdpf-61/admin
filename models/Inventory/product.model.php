<?php

class Product
{
    public $id;
    public $name;
    public $price;
    public $offer_price;
    public $categorie_id;
    public $sub_categorie_id;
    public $uom_id;
    public $barcode;
    public $sku;
    public $manufacturer_id;
    public $star;
    public $photo;
    public $description;
    public $weight;
    public $size;
    public $is_feature;
    public $is_brand;
    public $is_raw_material;
    public $created_at;
    public $updated_at;

    public function __construct($id, $name, $price, $offer_price, $categorie_id,$sub_categorie_id, $uom_id, $barcode, $sku, $manufacturer_id, $star, $photo, $description, $weight, $size, $is_feature, $is_brand, $is_raw_material)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->offer_price = $offer_price;
        $this->categorie_id = $categorie_id;
        $this->sub_categorie_id = $sub_categorie_id;
        $this->uom_id = $uom_id;
        $this->barcode = $barcode;
        $this->sku = $sku;
        $this->manufacturer_id = $manufacturer_id;
        $this->star = $star;
        $this->photo = $photo;
        $this->description = $description;
        $this->weight = $weight;
        $this->size = $size;
        $this->is_feature = $is_feature;
        $this->is_brand = $is_brand;
        $this->is_raw_material = $is_raw_material;
    }



    function save()
    {
        global $db, $base_url, $tx;
        $result = $db->query("insert into `{$tx}products`(name,price,offer_price,categorie_id,sub_categorie_id,uom_id,barcode,sku,manufacturer_id,star,photo,description,weight,size,is_feature,is_brand,is_raw_material)values('{$this->name}','{$this->price}','{$this->offer_price}','{$this->categorie_id}','{$this->sub_categorie_id}','{$this->uom_id}','{$this->barcode}','{$this->sku}','{$this->manufacturer_id}','{$this->star}','{$this->photo}','{$this->description}','{$this->weight}','{$this->size}','{$this->is_feature}','{$this->is_brand}','{$this->is_raw_material}')");

        return $result;
    }



    static function displayAll()
    {
        global $db, $base_url, $tx;
        $sql = $db->query("select * from `{$tx}products`");

        $result = $sql->fetch_all();

        return $result;
    }



    static function display()
    {
        global $db, $base_url, $tx;
        $result = $db->query("select * from `{$tx}products`");

        while ($row = $result->fetch_object()) {
            echo "<tr>
                <td scope='row'>$row->id</td>
                <td><img src='{$base_url}/img/product/$row->photo' height='65' width='65' class='rounded bg-default' alt=''></td>
                <td>$row->name</td>
                <td>$row->manufacturer_id</td>
                <td>$row->categorie_id</td>
                <td>$row->sub_categorie_id</td>
                <td>$row->is_brand</td>
                <td>$row->is_feature</td>
                <td>$row->barcode</td>
                <td>$row->sku</td>
                <td>$row->uom_id</td>
                <td>$row->size</td>
                <td>$row->price</td>
                <td>$row->offer_price</td>
                <td>$row->star</td>
                <td>$row->weight</td>
                <td>$row->description</td>
                <td>$row->is_raw_material</td>
                
                <td>
                  <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/product/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/product/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/product/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
                </tr>";
        }

        return $result;
    }

    function update()
    {
        global $db, $tx;

        $result = $db->query("update `{$tx}products` set name='{$this->name}', photo='{$this->photo}', price='{$this->price}', offer_price='{$this->offer_price}', categorie_id='{$this->categorie_id}',sub_categorie_id='{$this->sub_categorie_id}', uom_id='{$this->uom_id}',barcode='{$this->barcode}',sku='{$this->sku}',manufacturer_id='{$this->manufacturer_id}',star='{$this->star}',description='{$this->description}',weight='{$this->weight}',size='{$this->size}',is_feature='{$this->is_feature}',is_brand='{$this->is_brand}',is_raw_material='{$this->is_raw_material}' where id='{$this->id}'");

        return $result;
    }

  


    static function search($id)
    {
        global $db, $tx;
        $result = $db->query("select * from `{$tx}products` where id='$id'");

        return $result->fetch_object();
    }




    static function delete($id)
    {
        global $db, $tx;
        $result = $db->query("delete from `{$tx}products` where id=$id");

        return $result;
    }



    static function html_select($name = "cmbProduct")
    {
        global $db, $tx;
        $html = "<select id='$name' name='$name' class='form-select'> ";
        $result = $db->query("select id,name from {$tx}products");
        while ($product = $result->fetch_object()) {
            $html .= "<option value ='$product->id'>$product->name</option>";
        }
        $html .= "</select>";
        return $html;
    }


    static function html_select2($name = "cmbProduct")
    {
        global $db, $tx;
        $html = "<select id='$name' name='$name' class='form-select'> ";
        $result = $db->query("select id,name from {$tx}products where is_raw_material=0");
        while ($product = $result->fetch_object()) {
            $html .= "<option value ='$product->id'>$product->name</option>";
        }
        $html .= "</select>";
        return $html;
    }



    static function html_select3($name = "cmbProduct")
    {
        global $db, $tx;
        $html = "<select id='$name' name='$name' class='form-select'> ";
        $result = $db->query("select id,name from {$tx}products where is_raw_material=1");
        while ($product = $result->fetch_object()) {
            $html .= "<option value ='$product->id'>$product->name</option>";
        }
        $html .= "</select>";
        return $html;
    }


    public static function all()
    {
        global $db, $tx;
        $result = $db->query("select id,name,price,offer_price,categorie_id,sub_categorie_id,uom_id,barcode,sku,manufacturer_id,star,photo,description,weight,size,is_feature,is_brand,is_raw_material, created_at,updated_at from {$tx}products");
        $data = [];
        while ($product = $result->fetch_object()) {
            $data[] = $product;
        }
        return $data;
    }


    public static function find($id)
    {
        global $db, $tx;
        $result = $db->query("select id,name,price,offer_price,categorie_id,sub_categorie_id,uom_id,barcode,sku,manufacturer_id,star,photo,description,weight,size,is_feature,is_brand,is_raw_material,created_at,updated_at from {$tx}products where id='$id'");
        $product = $result->fetch_object();
        return $product;
    }



    static function get_last_id()
    {
        global $db, $tx;
        $result = $db->query("select max(id) last_id from {$tx}products");
        $product = $result->fetch_object();
        return $product->last_id;
    }


    public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}products $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}

    
}
