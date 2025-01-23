<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">CREATE STOCK_ADJUSTMENT_DETAILS</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Add a new Stock_adjustment_details</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
			<a class="btn btn-primary" href="<?php echo $base_url ?>/Stock_adjustment_details/index"><i class="bi bi-arrow-left"></i> Go Back</a>

			</div>
		</div>
	</div>
	<!--end breadcrumb-->

	<div class="row">
		<div class="col-xl-11 mx-auto">
			<div class="card">
				<div class="card-body">
				<h6 class="mb-0 text-uppercase">Add a new Stock_adjustment_details</h6>
					<div class="p-4 border rounded mt-4">

						<form action="<?php echo $base_url ?>/stock_adjustment_details/save" method="post" class="row g-3 needs-validation" novalidate="">


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Stock_adjustment_id<strong style="color: red;">*</strong></label>
								<input type="text" name="stock_adjustment_id" class="form-control" required="required" placeholder="Stock_adjustment_id">
								<div class="valid-feedback">Looks good!</div>
							</div>
		

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">products_id<strong style="color: red;">*</strong></label>
								<input type="text" name="products_id" class="form-control" required="required" placeholder="products_id">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">QTY<strong style="color: red;">*</strong></label>
								<input type="number" name="qty" class="form-control" required="required" placeholder="QTY">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Price<strong style="color: red;">*</strong></label>
								<input type="number" name="price" class="form-control" required="required" placeholder="Price">
								<div class="valid-feedback">Looks good!</div>
							</div>
		

							<div class="col-12">
								<button class="btn btn-primary" name="btnSubmit" type="submit"><i class="bi bi-save"></i> Save Stock_adjustment_details</button>
							</div>
						</form>

					</div>
				</div>
</main>