<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">EDIT ORDER-DETAILS</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Edit Order_details</li>
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
					<h6 class="mb-0 text-uppercase">Edit Order_details</h6>
					<div class="p-4 border rounded mt-4">

						<form action="<?php echo $base_url ?>/order_details/update" method="post" class="row g-4 needs-validation" novalidate="" enctype="multipart/form-data">


						<input type="hidden" name="id" class="form-label" value="<?php echo $order_details->id?>">

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Product Name<strong style="color: red;">*</strong></label>
								<select name="core_products_id" id="" class="form-select">
									<option value="<?php echo $order_details->core_products_id?>">All Product</option>
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

								<select name="core_orders_id" id="" class="form-select">
									<option value="<?php echo $order_details->core_order_id?>">Order List</option>
									<?php
									$orders = Order::displayAll();
									foreach ($orders as $value) {
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>

								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Price<strong style="color: red;">*</strong></label>
								<input type="number" name="price" class="form-control" required="required" placeholder="Price" value="<?php echo $order_details->price?>">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Quentaty <strong style="color: red;">*</strong></label>
								<input type="number" name="qty" class="form-control" required="required" placeholder="Discount" value="<?php echo $order_details->qty?>">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Uom Name<strong style="color: red;">*</strong></label>

								<select name="core_uom_id" id="" class="form-select">
									<option value="<?php echo $order_details->core_uom_id?>">All UOM</option>
									<?php
									$uom = Uom::displayAll();
									foreach ($uom as $value) {
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>

								<!-- <input type="text" name="core_uom_id" class="form-control" required="required" placeholder=""> -->
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Vat <strong style="color: red;">*</strong></label>
								<input type="number" name="vat" class="form-control" required="required" placeholder="Vat" value="<?php echo $order_details->vat?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-12">
								<button class="btn btn-primary" name="btnUpdate" type="submit"><i class="bi bi-save"></i> Save Order</button>
							</div>
						</form>
					</div>
				</div>
</main>