<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">CREATE SUPPLIERS</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Add a new Suppliers</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
			<a class="btn btn-primary" href="<?php echo $base_url ?>/purchases_details/index"><i class="bi bi-arrow-left"></i> Go Back</a>
			</div>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="row">
		<div class="col-xl-11 mx-auto">
			<div class="card">
				<div class="card-body">
				<h6 class="mb-0 text-uppercase">Add a new Suppliers</h6>
					<div class="p-4 border rounded mt-4">
						
						<form action="<?php echo $base_url ?>/purchases_details/save" method="post" class="row g-3 needs-validation" novalidate="" enctype="multipart/form-data">

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">purchases_id <strong style="color: red;">*</strong></label>
								<input type="text" name="purchases_id" class="form-control" required="required" placeholder="Supplier Name">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">product_id <strong style="color: red;">*</strong></label>
								<input type="text" name="product_id" class="form-control" required="required" placeholder="Phone Number">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">qty  <strong style="color: red;">*</strong></label>
								<input type="number" name="qty" class="form-control" required="required" placeholder="Email Address">
								<div class="valid-feedback">Looks good!</div>
							</div>

						
							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">price <strong style="color: red;">*</strong></label>
								<input type="text" name="price" class="form-control" required="" placeholder="price">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">Vat <strong style="color: red;">*</strong></label>
								<input type="text" name="vat" class="form-control" required="" placeholder="Vat">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">discount <strong style="color: red;">*</strong></label>
								<input type="number" name="discount" class="form-control" required="" placeholder="discount">
								<div class="valid-feedback">Looks good!</div>
							</div>

						
							<div class="col-12">
								<button class="btn btn-primary" name="btnSubmit" type="submit"><i class="bi bi-save"></i> Save Suppliers</button>
							</div>
						</form>
					</div>
				</div>
</main>