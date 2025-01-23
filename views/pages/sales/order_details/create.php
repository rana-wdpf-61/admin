<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">CREATE ORDER-DETAILS</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Add a new Order_details</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
				<a class="btn btn-primary" href="<?php echo $base_url ?>/order_details/index"><i class="bi bi-arrow-left"></i> Go Back</a>

			</div>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="row">
		<div class="col-xl-11 mx-auto">
			<div class="card">
				<div class="card-body">
					<h6 class="mb-0 text-uppercase">Add a new Order_details</h6>
					<div class="p-4 border rounded mt-4">

						<form action="<?php echo $base_url ?>/order_details/save" method="post" class="row g-4 needs-validation" novalidate="" enctype="multipart/form-data">

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Product Name<strong style="color: red;">*</strong></label>
								<select name="product_id" id="" class="form-select">
									<option value="">All Product</option>
									<?php
									$products = Product::displayAll();
									foreach ($products as $value) {
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Order<strong style="color: red;">*</strong></label>

								<select name="order_id" id="" class="form-select">
									<option value="">Order List</option>
									<?php
									$orders = Order::displayAll();
									foreach ($orders as $value) {
										echo "<option value='$value[0]'>$value[2]</option>";
									}
									?>
								</select>

								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Price<strong style="color: red;">*</strong></label>
								<input type="number" name="price" class="form-control" required="required" placeholder="Price">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Quentaty <strong style="color: red;">*</strong></label>
								<input type="number" name="qty" class="form-control" required="required" placeholder="Discount">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Discount <strong style="color: red;">*</strong></label>
								<input type="number" name="discount" class="form-control" required="required" placeholder="Discount">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Uom Name<strong style="color: red;">*</strong></label>

								<select name="uom_id" id="" class="form-select">
									<option value="">All UOM</option>
									<?php
									$uom = Uom::displayAll();
									foreach ($uom as $value) {
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>
								
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Vat <strong style="color: red;">*</strong></label>
								<input type="number" name="vat" class="form-control" required="required" placeholder="Vat">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-12">
								<button class="btn btn-primary" name="btnSubmit" type="submit"><i class="bi bi-save"></i> Save Order_details</button>
							</div>
						</form>
					</div>
				</div>
</main>