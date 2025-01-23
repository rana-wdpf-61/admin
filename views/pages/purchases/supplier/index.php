<main class="container">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">SUPPLIER PURCHASES</div>

    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="<?php echo $base_url?>/home/index"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Supplier Details</li>
        </ol>
      </nav>
    </div>

    <div class="ms-auto">
      <div class="btn-group">
        <a class="btn btn-primary" href="<?php echo $base_url ?>/supplier/create"> Add Suppliers<i class="bi bi-plus-circle"></i></a>
      </div>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="card">
    <div class="card-body">

      <!-- start search and show button -->
      <div class="row g-3">
        <div class="col-lg-3 col-md-6 me-auto">
          <div class="ms-auto position-relative">
            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
            <input class="form-control ps-5" type="text" placeholder="Search Payment">
          </div>
        </div>
        <div class="col-lg-2 col-6 col-md-3">
          <select class="form-select">
            <option>Status</option>
            <option>Active</option>
            <option>Disabled</option>
            <option>Pending</option>
            <option>Show All</option>
          </select>
        </div>
        <div class="col-lg-2 col-6 col-md-3">
          <select class="form-select">
            <option>Show 10</option>
            <option>Show 30</option>
            <option>Show 50</option>
          </select>
        </div>
      </div>
      <!-- <div class="p-0 table-responsive table-custom my-3">
        <table class="table table-bordered table-striped">
          <thead class="table-primary">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Photo</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
              <th scope="col">Address</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php // Supplier::display(); ?>
          </tbody>
        </table>
      </div> -->
    </div>
    <nav aria-label="Page navigation example">

      <?php
      global $db, $tx, $base_url;
      // $con = new mysqli("localhost", "root", "", "production_management");

      $result = $db->query("select * from {$tx}suppliers");

      $rows = $result->num_rows;

      $per_page = 8;
      $pages = ceil($rows / $per_page);

      $start = 0;
      if (isset($_GET["page_no"])) {
        $page = $_GET["page_no"] - 1;

        $start = $page * $per_page;
      }

      //  $limit = $db->query("select * from {$tx}suppliers limit $start, $per_page");

      ?>

      <div class="p-0 table-responsive table-custom my-1 m-3">
        <table class="table table-bordered table-striped table-hover align-middle">
          <thead class="table-primary">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Photo</th>
              <th scope="col">Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
              <th scope="col">Address</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            <?php

            $limit = $db->query("select * from {$tx}suppliers limit $start, $per_page");

            while ($row = $limit->fetch_object()) {
              echo "<tr>
              <td>$row->id</td>
              <td><img class='rounded-circle' height='50' width='50' src='{$base_url}/img/Supplier/$row->photo' alt=''></td>
              <td>$row->name</td>
              <td>$row->phone</td>
              <td>$row->email</td>
              <td>$row->address</td>
              <td>
                <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                  <a href='{$base_url}/supplier/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                  <a href='{$base_url}/supplier/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                  <a href='{$base_url}/supplier/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                </div>
              </td>
              </tr>";
            }
            ?>

          </tbody>
        </table>
      </div>

      <ul class="pagination justify-content-end m-3">
        <li class="page-item"><a class="page-link" href="<?php echo $base_url?>/supplier/index?page_no=1">First</a></li>

        <?php

        if (isset($_GET["page_no"]) && $_GET["page_no"] > 1) {
          $page_no = $_GET["page_no"] - 1;
          echo "<li class='page-item'><a class='page-link' href='{$base_url}/supplier/index?page_no=$page_no'>Previous</a></li>";
          
        } else {
          echo "<li class='page-item'><a class='page-link' href='#'>Previous</a></li>";
        }
        ?>


        <?php
        if (!isset($_GET["page_no"])) {
          echo " <li class='active page-item'><a class='page-link' href='{$base_url}/supplier/index?page_no=1'>1</a></li>";
          $counter = 2;
        } else {
          $counter = 1;
        }

        ?>

        <?php
        for ($i = $counter; $i <= $pages; $i++) {
          if (isset($_GET["page_no"])  &&  $i == ($_GET["page_no"])) {
            echo " <li class='active page-item'><a class='page-link' href='{$base_url}/supplier/index?page_no=$i'>$i</a></li>";
          } else {
            echo " <li class='page-item'><a class='page-link' href='{$base_url}/supplier/index?page_no=$i'>$i</a></li>";
          }
        }
        ?>

        <?php

        if (isset($_GET["page_no"]) && $_GET["page_no"] >= $pages) {
          echo "<li class='page-item'><a class='page-link' href='#'>Next</a></li>";
        } elseif (isset($_GET["page_no"])) {
          $page_no = $_GET["page_no"] + 1;
          echo "<li class='page-item'><a class='page-link' href='{$base_url}/supplier/index?page_no=$page_no'>Next</a></li>";
        } else {
          echo "<li class='page-item'><a class='page-link' href='{$base_url}/supplier/index?page_no=2'>Next</a></li>";
        }
        ?>
        <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
        <li class="page-item"><a class="page-link" href="<?php echo $base_url?>/supplier/index?page_no=<?php echo $pages ?>">Last</a></li>
      </ul>
    </nav>
  </div>
</main>