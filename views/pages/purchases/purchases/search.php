<!-- 
 <div class="container p-5">
 <form action="<?php echo $base_url?>/employee/search_id" method="post">
   <div class="mb-3">
     <label for="name" class="form-label">ID</label>
     <input  name="id" type="text" class="form-control" id="name" aria-describedby="name">

   </div>
   
   <button name="search" type="submit" class="btn btn-primary">Search</button>
 </form>
 </div> -->


<style>
 @media print {
    body,
    .btn_print {
        visibility: hidden; /* Hide everything except the print section */
    }
    #section-to-print {
        visibility: visible; /* Ensure the target section is visible */
        position: absolute; /* Align it properly */
        left: 0;
        top: 0;
    }
}

</style>



 <div id="section-to-print">
    <h1>Printable Content</h1>
    <p>This section will be printed.</p>
</div>

<button class="btn_print" onclick="window.print()">Print</button>
<div>
    <p>This content will not be printed.</p>
</div>


