<?php 

//print_r($district);

?>

<div class="container">
    <div class="row">
    <form action="<?php echo $base_url?>/district/update" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" value="<?php echo $district->name?>" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <input type="hidden" name="id" class="form-control" value="<?php echo $district->id?>">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Division</label>
       
      <select class="form-control" name="division_id" >
     
        <option value="1">Dhaka</option>
        <option value="2">Barishal</option>
        <option value="3">chittagong</option>
  
      </select>
  </div>
  
  <button type="submit" name="btnUpdate" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>

