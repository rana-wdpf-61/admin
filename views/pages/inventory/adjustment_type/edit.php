<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">EDIT ADJUSTMENT_TYPE</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Edit Adjustment_type</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
			<a class="btn btn-primary" href="<?php echo $base_url ?>/adjustment_type/index"><i class="bi bi-arrow-left"></i> Go Back</a>

			</div>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="row">
		<div class="col-xl-11 mx-auto">
			<div class="card">
				<div class="card-body">
				<h6 class="mb-0 text-uppercase">Edit Adjustment_type</h6>
					<div class="p-4 border rounded mt-4">

						<form action="<?php echo $base_url ?>/adjustment_type/update" method="post" class="row g-3 needs-validation" novalidate="">


            				<input type="hidden" name="id" class="form-control" value="<?php echo $adjustment_type->id?>">

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">adjustment_type Name <strong style="color: red;">*</strong></label>
								<input type="text" name="name" class="form-control" required="required" placeholder="Adjustment_type Name" value="<?php echo $adjustment_type->name?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Factor<strong style="color: red;">*</strong></label>
								<input type="text" name="factor" class="form-control" required="required" placeholder="Factor" value="<?php echo $adjustment_type->factor?>">
								<div class="valid-feedback">Looks good!</div>
							</div>
		

							<div class="col-12">
								<button class="btn btn-primary" name="btnUpdate" type="submit"><i class="bi bi-save"></i> Save Changes</button>
							</div>
						</form>
					</div>
				</div>
</main>