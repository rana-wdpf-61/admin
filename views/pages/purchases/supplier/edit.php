<main class="container">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Edit SUPPLIERS</div>

    <div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Edit Suppliers</li>
				</ol>
			</nav>
		</div>

    <div class="ms-auto">
      <div class="btn-group">
        <a class="btn btn-primary" href="<?php echo $base_url ?>/supplier/index"><i class="bi bi-arrow-left"></i> Go Back</a>

      </div>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="row">
    <div class="col-xl-11 mx-auto">
      <div class="card">
        <div class="card-body">
          <div>
            <h6 class="mb-0 text-uppercase">Edit Suppliers</h6>
          </div>
          <div class="p-4 border rounded mt-4">

            <!-- Validation From -->

            <form action="<?php echo $base_url; ?>/supplier/update" method="post" class="row g-3 needs-validation" novalidate="" enctype="multipart/form-data">

            
              <input type="hidden" name="id" class="form-control" required="" placeholder="" value="<?php echo $supplier->id; ?>">
      

              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Supplier Name <span style="color: red;">*</span></label>
                <input type="text" name="name" class="form-control" required="" placeholder="Supplier Name" value="<?php echo $supplier->name; ?>">
                <div class="valid-feedback">Looks good!</div>
              </div>

              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control" required="" value="<?php echo $supplier->photo; ?>">
                <div class="valid-feedback">Looks good!</div>
              </div>

              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Phone Number <span style="color: red;">*</span></label>
                <input type="text" name="phone" class="form-control" required="" placeholder="Phone Number" value="<?php echo $supplier->phone; ?>">
                <div class="valid-feedback">Looks good!</div>
              </div>

              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Email Address <span style="color: red;">*</span></label>
                <input type="email" name="email" class="form-control" required="" placeholder="Email Address" value="<?php echo $supplier->email; ?>">
                <div class="valid-feedback">Looks good!</div>
              </div>

              <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Supplier Address <span style="color: red;">*</span></label>

                <!-- <input type="text" name="address" class="form-control" required="" placeholder="Supplier Address" value="<?php echo $supplier->address; ?>"> -->

                <textarea class="form-control" id="validationTextarea" placeholder="Supplier Address" required="required" name="address" id=""></textarea> 

                <div class="valid-feedback">Looks good!</div>
              </div>

              <div class="col-12">
                <button class="btn btn-primary" name="btnUpdate" type="submit"><i class="bi bi-save"></i> Save Changes</button>
              </div>
            </form>
          </div>
        </div>
</main>