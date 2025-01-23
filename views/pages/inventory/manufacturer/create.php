<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">CREATE MANUFACTURER</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Add a new Manufacturer</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
			<a class="btn btn-primary" href="<?php echo $base_url ?>/manufacturer/index"><i class="bi bi-arrow-left"></i> Go Back</a>

			</div>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="row">
		<div class="col-xl-11 mx-auto">
			<div class="card">
				<div class="card-body">
				<h6 class="mb-0 text-uppercase">Add a new Manufacturer</h6>
					<div class="p-4 border rounded mt-4">

						<!-- Start Form Validation -->

						<form action="<?php echo $base_url ?>/manufacturer/save" method="post" class="row g-3 needs-validation" novalidate="">

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Manufacturer Name <strong style="color: red;">*</strong></label>
								<input type="text" name="name" class="form-control" required="" placeholder="Manufacturer Name">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Phone Number <strong style="color: red;">*</strong></label>
								<input type="text" name="phone" class="form-control" required="" placeholder="Phone Number">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">Email Address <strong style="color: red;">*</strong></label>
								<input type="email" name="email" class="form-control" required="" placeholder="Email Address">
								<div class="valid-feedback">Looks good!</div>
							</div>

						
							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">Manufacturer Address <strong style="color: red;">*</strong></label>
								 <textarea class="form-control" id="validationTextarea" placeholder="Manufacturer Address" required="" name="address" id=""></textarea> 
								<div class="valid-feedback">Looks good!</div>
							</div>

							

							<div class="col-12">
								<button class="btn btn-primary" name="btnSubmit" type="submit"><i class="bi bi-save"></i> Save Manufacturer</button>
							</div>
						</form>
						<!-- End From Validation -->
					</div>
				</div>
</main>