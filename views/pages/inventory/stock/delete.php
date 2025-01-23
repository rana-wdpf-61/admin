<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">DELETE STOCK</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Delete Stock</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
			<a class="btn btn-primary" href="<?php echo $base_url ?>/stock/index"><i class="bi bi-arrow-left"></i> Go Back</a>

			</div>
		</div>
	</div>
	<!--end breadcrumb-->

	<div class="row">
		<div class="col-xl-11 mx-auto">
			<div class="card">
				<div class="card-body">
				<h6 class="mb-0 text-uppercase">Delete Stock</h6>
					<div class="p-4 border rounded mt-4">

						<form action="<?php echo $base_url ?>/stock/delete_confirm" method="post" class="row g-4 needs-validation" novalidate="">

						<input type="hidden" class="form-select" name="id" value="<?php echo $stock->id ?>">

						<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Product Name<strong style="color: red;">*</strong></label>
								<select disabled name="product_id" id="" class="form-select">
									<option value="<?php echo $stock->product_id ?>">All Product</option>
									<?php
									$products = Product::displayAll();
									foreach ($products as $value) {
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>
		

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Transaction_type<strong style="color: red;">*</strong></label>
								<select disabled name="transaction_type_id" id="" class="form-select">
									<option value="<?php echo $stock->transaction_type_id ?>">All Transaction_type</option>
									<?php
									$transaction_type = Transaction_type::displayAll();
									foreach ($transaction_type as $value) {
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Warehouse Name<strong style="color: red;">*</strong></label>
								<select disabled name="warehouse_id" id="" class="form-select">
									<option value="<?php echo $stock->warehouse_id ?>">All Warehouse</option>
									<?php
									$warehouse = Warehouse::displayAll();
									foreach ($warehouse as $value) {
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Quentaty<strong style="color: red;">*</strong></label>
								<input disabled type="number" name="qty" class="form-control" required="required" placeholder="Price" value="<?php echo $stock->qty ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">Remark <strong style="color: red;">*</strong></label>
								<textarea disabled class="form-control" id="validationTextarea" placeholder="Remark" required="required" name="remark" id=""><?php echo $stock->remark ?></textarea>
								<div class="valid-feedback">Looks good!</div>
							</div>
		
		

							<div class="col-12">
								<button class="btn btn-primary" name="btnDelete" type="submit"><i class='bi bi-trash-fill'></i> Delete</button>
							</div>
						</form>

					</div>
				</div>
</main>








							<div class="col-12">
								<button class="btn btn-primary" name="btnSubmit" type="submit"><i class='bi bi-trash-fill'></i> Delete</button>
							</div>
						</form>

					</div>
				</div>
</main>














