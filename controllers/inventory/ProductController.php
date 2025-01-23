<?php 
class ProductController{

    function index(){
        view("inventory");
    }

    function create(){
        view("inventory");
    }
    
    function save(){
        if (isset($_POST['btnSubmit'])) {
            $name= $_POST["name"];
            $photo= $_FILES["photo"]["name"];
            $price= $_POST["price"];
            $offer_price= $_POST["offer_price"];
            $categorie_id= $_POST["categorie_id"];
            $sub_categorie_id= $_POST["sub_categorie_id"];
            $uom_id= $_POST["uom_id"];
            $barcode= $_POST["barcode"];
            $sku= $_POST["sku"];
            $manufacturer_id= $_POST["manufacturer_id"];
            $star= $_POST["star"];
            $description= $_POST["description"];
            $weight= $_POST["weight"];
            $size= $_POST["size"];
            $is_feature= $_POST["is_feature"];
            $is_brand= $_POST["is_brand"];
            $is_raw_material= $_POST["is_raw_material"];
            
            $product= new Product(null, $name, $price, $offer_price, $categorie_id,$sub_categorie_id, $uom_id, $barcode, $sku, $manufacturer_id, $star, $photo, $description, $weight, $size, $is_feature, $is_brand, $is_raw_material);

           $result = $product->save();
        }
       redirect("index");
    }

    function edit(){
         $id=$_GET["id"];
         $product= Product::search($id);
         view("inventory", $product);
    }

    function update(){
        if (isset($_POST['btnUpdate'])){
            $id= $_POST["id"];
            $name= $_POST["name"];
            $photo= $_FILES["photo"]["name"];
            $price= $_POST["price"];
            $offer_price= $_POST["offer_price"];
            $categorie_id= $_POST["categorie_id"];
            $sub_categorie_id= $_POST["sub_categorie_id"];
            $uom_id= $_POST["uom_id"];
            $barcode= $_POST["barcode"];
            $sku= $_POST["sku"];
            $manufacturer_id= $_POST["manufacturer_id"];
            $star= $_POST["star"];
            $description= $_POST["description"];
            $weight= $_POST["weight"];
            $size= $_POST["size"];
            $is_feature= $_POST["is_feature"];
            $is_brand= $_POST["is_brand"];
            $is_raw_material= $_POST["is_raw_material"];
            
            $product= new Product($id, $name, $price, $offer_price, $categorie_id,$sub_categorie_id, $uom_id, $barcode, $sku, $manufacturer_id, $star, $photo, $description, $weight, $size, $is_feature, $is_brand, $is_raw_material);
            
            $result = $product->update();
    }
    redirect("index");
}

    function delete(){
        $id=$_GET["id"];
        $product= Product::search($id);
        view("inventory", $product);
    }


    function confirm_delete(){
        if (isset($_POST['btnDelete'])){
            $id= $_POST["id"];
            $result = Product::delete($id);
        }
        redirect("index");
    }



    function search(){ 
        view("inventory");
    }


    // function search_id(){
    //     if(isset($_GET["search"])){
    //         $id=$_GET["id"];
    //         $result= Employee::search($id);
    //     }
    //     redirect("index");
    // }

}

?>


