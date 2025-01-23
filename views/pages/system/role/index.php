<main class="container">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Tables</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Advance Tables</li>
                  </ol>
                </nav>
              </div>
              <div class="ms-auto">
                <div class="btn-group">
                  <!-- <button type="button" class="btn btn-primary">Settings</button> -->
                   <a class="btn btn-primary" href="<?php echo $base_url ?>/product/create">Add Data</a>
                  <!-- <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                  </div> -->
                </div>
              </div>
            </div>
            <!--end breadcrumb-->

<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center">
      <h5 class="mb-0">Product Details</h5>
      <form class="ms-auto position-relative">
        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
        <input class="form-control ps-5" type="text" placeholder="search">
      </form>
    </div>
    <div class="table-responsive mt-3">
      <table class="table align-middle">
        <thead class="table-secondary">
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Price</th>
            <th>Offer_price</th>
            <th>Categories_id</th>
            <th>UOM_id</th>
            <th>Barcode</th>
            <th>SKU</th>
            <th>Manufacturer_id</th>
            <th>Star</th>
            <th>Description</th>
            <th>Weight</th>
            <th>Size</th>
            <th>Is_feature</th>
            <th>Is_brand</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php Product::display(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</main>