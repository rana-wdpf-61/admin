<main class="container">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">EDIT MANUFACTURER</div>

<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Edit Manufacturer</li>
				</ol>
			</nav>
		</div> 

    <div class="ms-auto">
      <div class="btn-group">
        <a class="btn btn-primary" href="<?php echo $base_url ?>/manufacturer/index"><i class="bi bi-arrow-left"></i> Go Back</a>

        <!-- <button type="button" class="btn btn-primary">Settings</button>
				<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <strong class="visually-hidden">Toggle Dropdown</strong>
				</button>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
					<a class="dropdown-item" href="javascript:;">Another action</a>
					<a class="dropdown-item" href="javascript:;">Something else here</a>
					<div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
				</div> -->

      </div>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="row">
    <div class="col-xl-11 mx-auto">
      <div class="card">
        <div class="card-body">
          <div>
            <h6 class="mb-0 text-uppercase">Edit Manufacturer</h6>
          </div>
          <div class="p-4 border rounded mt-4">

            <!-- Validation From -->

            <form action="<?php echo $base_url; ?>/manufacturer/update" method="post" class="row g-3 needs-validation" novalidate="">

            
              <input type="hidden" name="id" class="form-control" required="" placeholder="" value="<?php echo $manufacturer->id; ?>">
      

              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Manufacturer Name <strong style="color: red;">*</strong></label>
                <input type="text" name="name" class="form-control" required="" placeholder="Supplier Name" value="<?php echo $manufacturer->name; ?>">
                <div class="valid-feedback">Looks good!</div>
              </div>

              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Phone Number <strong style="color: red;">*</strong></label>
                <input type="text" name="phone" class="form-control" required="" placeholder="Phone Number" value="<?php echo $manufacturer->phone; ?>">
                <div class="valid-feedback">Looks good!</div>
              </div>

              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Email Address <strong style="color: red;">*</strong></label>
                <input type="email" name="email" class="form-control" required="" placeholder="Email Address" value="<?php echo $manufacturer->email; ?>">
                <div class="valid-feedback">Looks good!</div>
              </div>

              <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Manufacturer Address <strong style="color: red;">*</strong></label>
                <input type="text" name="address" class="form-control" required="" placeholder="Manufacturer Address" value="<?php echo $manufacturer->address; ?>">
                <!-- <textarea class="form-control" id="validationTextarea" placeholder="" required="" name="address" id=""></textarea> -->
                <div class="valid-feedback">Looks good!</div>
              </div>

              <div class="col-12">
                <button class="btn btn-primary" name="btnUpdate" type="submit"><i class="bi bi-save"></i> Save Changes</button>
              </div>
            </form>
          </div>
        </div>
</main>