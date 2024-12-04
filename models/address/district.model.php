<?php 
class District{
public $id;
public $name;
public $division_id;
public $photo;


public function __construct($id , $name, $division_id , $photo) {
     $this->id=$id;
     $this->name=$name;
     $this->division_id=$division_id;
     $this->photo=$photo;
    
}

function save()
{
    global $db, $tx;
    $result = $db->query("insert into {$tx}districts(name ,division_id,photo) values('$this->name', $this->division_id,'$this->photo')");
    return $result;
}
static function display()
{
    global $db, $tx, $base_url; 
    // $result = $db->query("select ds.*, dv.name division from {$tx}districts ds join {$tx}divisions dv on dv.id= ds.division_id ");
    $result = $db->query("select ds.*, dv.name division from {$tx}districts ds , {$tx}divisions dv where dv.id= ds.division_id and ds.inactive=0 ");
    $html = "
    <table class=\"table table-sm\">
    <thead>
        <tr>
            <th style=\"width: 10px\">Id</th>
            <th>name</th>
            <th>division</th>
           
            <th>action</th>
        
        </tr>
    </thead>
    <tbody>
        
        
        ";

        while ($row = $result->fetch_object()) {
            $html .= "
        
        
        <tr class=\"align-middle\">
            <td>$row->id</td>
            <td>$row->name</td>
            <td>$row->division</td>
            
            <td> 
            <a class='btn btn-success'href=\" \">Details</a> | 
            <a class='btn btn-secondary'href=\"{$base_url}/district/edit/$row->id\">Edit</a> | 
            <a class='btn btn-danger' href=\" {$base_url}/district/delete/$row->id\">Delete</a>
            <a class='btn btn-danger' onclick=\"confirm(\"Really?\")\" href=\"{$base_url}/district/trash/$row->id\">trash</a></td>

        </tr>";
        }

        $html .= " </tbody></table>";

        return $html;
}

function update(){
    global $db, $tx;
    $result = $db->query("update {$tx}districts set name='$this->name', division_id=$this->division_id where id=$this->id");
    return $result;
}
static function search($id){
    global $db, $tx;
    $result = $db->query(" select * from  {$tx}districts where id=$id");
    return $result->fetch_object();
}
static function delete($id){
    global $db, $tx;
    $result = $db->query(" delete from {$tx}districts where id=$id");
    return $result;
}
static function trash($id){
    global $db, $tx;
    $result = $db->query("update {$tx}districts set inactive=1 where id=$id");
    return $result;
}


}


?>