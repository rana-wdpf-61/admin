<main class="container">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">CATEGORIES</div>

    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Categories Details</li>
        </ol>
      </nav>
    </div>

    <div class="ms-auto">
      <div class="btn-group">

        <!-- <button type="button" class="btn btn-primary">Settings</button> -->

        <a class="btn btn-primary" href="<?php echo $base_url ?>/categories/create"> Add Categories<i class="bi bi-plus-circle"></i></a>

        <!-- Setting button -->
         
    <!-- <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span></button>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
          <a class="dropdown-item" href="javascript:;">Another action</a>
          <a class="dropdown-item" href="javascript:;">Something else here</a>
          <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
        </div> -->

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
<!-- end search and show button -->

      <!-- <div class="d-flex align-items-center">
        <h5 class="mb-0">Manufacturer Details</h5>
        <form class="ms-auto position-relative">
          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
          <input class="form-control ps-5" type="text" placeholder="Type Name or Id">
        </form>
      </div> -->

      <div class="p-0 table-responsive table-custom my-3">
        <table class="table table-bordered">
          <thead class="table-primary">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php Categories::display(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>