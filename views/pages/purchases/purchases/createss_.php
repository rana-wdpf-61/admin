
	<main class="container">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">CREATE PURCHASES</div>

			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Add a new Purchases</li>
					</ol>
				</nav>
			</div>

			<div class="ms-auto">
				<div class="btn-group">
					<a class="btn btn-primary" href="<?php echo $base_url ?>/purchases/index"><i class="bi bi-arrow-left"></i> Go Back</a>

				</div>
			</div>
		</div>
		<!--end breadcrumb-->
		<div class="row">
			<div class="col-xl-11 mx-auto">
				<div class="card">
					<div class="card-body">
						<h6 class="mb-0 text-uppercase">Add a new Purchases</h6>
						<div class="p-4 border rounded mt-4">

							<form action="<?php echo $base_url ?>/purchases/save" method="post" class="row g-3 needs-validation" novalidate="" enctype="multipart/form-data">

								<div class="col-md-4">
									<label for="validationCustom01" class="form-label">supplier_id<strong style="color: red;">*</strong></label>
									<select name="supplier_id" id="suppliers" class="form-select">
										<option value="">Select supplier_id</option>
										<?php
										$supplierss = Supplier::displayAll();
										foreach ($supplierss as $value) {
											echo "<option value='$value[0]'>Supplier id: $value[1]</option>";
										}
										?>
									</select>
									<div class="valid-feedback">Looks good!</div>
								</div>

								<div class="col-md-4">
									<label for="validationCustom01" class="form-label">Products_id <strong style="color: red;">*</strong></label>

									<select name="products_id" id="" class="form-select">
										<option value="">Select Products_id</option>
										<?php
										$products = Product::displayAll();
										foreach ($products as  $value) {
											echo "<option value='$value[0]'>Product id: $value[0]</option>";
										}
										?>
									</select>

									<div class="valid-feedback">Looks good!</div>
								</div>

								<div class="col-md-4">
									<label for="validationCustom01" class="form-label">Status_id<strong style="color: red;">*</strong></label>
									<input type="text" name="status_id" class="form-control" required="required" placeholder="Supplier Name">
									<div class="valid-feedback">Looks good!</div>
								</div>

								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Order_total<strong style="color: red;">*</strong></label>
									<input type="number" name="order_total" class="form-control" required="required" placeholder="Order_total">
									<div class="valid-feedback">Looks good!</div>
								</div>

								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Paid_amount<strong style="color: red;">*</strong></label>
									<input type="number" name="paid_amount" class="form-control" required="required" placeholder="Paid_amount">
									<div class="valid-feedback">Looks good!</div>
								</div>

								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Discount <strong style="color: red;">*</strong></label>
									<input type="number" name="discount" class="form-control" required="required" placeholder="Discount">
									<div class="valid-feedback">Looks good!</div>
								</div>

								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Vat <strong style="color: red;">*</strong></label>
									<input type="number" name="vat" class="form-control" required="required" placeholder="Vat">
									<div class="valid-feedback">Looks good!</div>
								</div>

								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">delivery_date<strong style="color: red;">*</strong></label>
									<input type="text" name="delivery_date" class="form-control" required="required" placeholder="">
									<div class="valid-feedback">Looks good!</div>
								</div>

								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Date<strong style="color: red;">*</strong></label>
									<input type="date" name="date" class="form-control" required="required" placeholder="">
									<div class="valid-feedback">Looks good!</div>
								</div>


								<div class="col-md-12">
									<label for="validationCustom01" class="form-label">Shipping_address <strong style="color: red;">*</strong></label>
									<textarea class="form-control" id="validationTextarea" placeholder="Shipping_address" required="required" name="shipping_address" id=""></textarea>

									<div class="valid-feedback">Looks good!</div>
								</div>


								<div class="col-md-12">
									<label for="validationCustom01" class="form-label">Description <strong style="color: red;">*</strong></label>
									<textarea class="form-control" id="validationTextarea" placeholder="Description" required="required" name="description" id=""></textarea>

									<div class="valid-feedback">Looks good!</div>
								</div>


								<div class="col-12">
									<button class="btn btn-primary" name="btnSubmit" type="submit"><i class="bi bi-save"></i> Save Purchass</button>
								</div>
							</form>
						</div>
					</div>
	</main>
