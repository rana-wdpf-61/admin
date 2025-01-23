<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">EDIT WAREHOUSE</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Edit Warehouse</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
			<a class="btn btn-primary" href="<?php echo $base_url ?>/warehouse/index"><i class="bi bi-arrow-left"></i> Go Back</a>

			</div>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="row">
		<div class="col-xl-11 mx-auto">
			<div class="card">
				<div class="card-body">
				<h6 class="mb-0 text-uppercase">Edit Warehouse</h6>
					<div class="p-4 border rounded mt-4">

						<!-- Start Form Validation -->

						<form action="<?php echo $base_url ?>/warehouse/update" method="post" class="row g-4 needs-validation" novalidate="">


            <input type="hidden" name="id" class="form-control" value="<?php echo $warehouse->id?>">

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Warehouse Name <strong style="color: red;">*</strong></label>
								<input type="text" name="name" class="form-control" required="" placeholder="Warehouse Name" value="<?php echo $warehouse->name?>">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Phone Number <strong style="color: red;">*</strong></label>
								<input type="text" name="phone" class="form-control" required="" placeholder="Phone Number" value="<?php echo $warehouse->phone?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">Location <strong style="color: red;">*</strong></label>
								<input type="text" name="location" class="form-control" required="" placeholder="Phone Number" value="<?php echo $warehouse->location?>">
								<div class="valid-feedback">Looks good!</div>
							</div>
						
							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">Warehouse Address <strong style="color: red;">*</strong></label>
								 <textarea class="form-control" id="validationTextarea" placeholder="Warehouse Address" required="" name="address" id=""><?php echo $warehouse->address?></textarea> 
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-12">
								<button class="btn btn-primary" name="btnUpdate" type="submit"><i class="bi bi-save"></i> Save Warehouse</button>
							</div>
						</form>
						<!-- End From Validation -->
					</div>
				</div>
</main>