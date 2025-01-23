<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">CREATE STOCK_ADJUSTMENT</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Add a new Stock_adjustment</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
			<a class="btn btn-primary" href="<?php echo $base_url ?>/stock_adjustment/index"><i class="bi bi-arrow-left"></i> Go Back</a>

			</div>
		</div>
	</div>
	<!--end breadcrumb-->

	<div class="row">
		<div class="col-xl-11 mx-auto">
			<div class="card">
				<div class="card-body">
				<h6 class="mb-0 text-uppercase">Add a new Stock_adjustment</h6>
					<div class="p-4 border rounded mt-4">

						<form action="<?php echo $base_url ?>/stock_adjustment/save" method="post" class="row g-4 needs-validation" novalidate="">

						<div class="col-md-6">
								<label for="validationCustom01" class="form-label">User Name<strong style="color: red;">*</strong></label>
								<select name="user_id" id="" class="form-select">
									<option value="">All Product</option>
									<?php
									$user = User::displayAll();
									foreach ($user as $value) {
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>
		

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Adjustment_type<strong style="color: red;">*</strong></label>
								<select name="adjustment_type_id" id="" class="form-select">
									<option value="">All Adjustment_type</option>
									<?php
									$adjustment_type =Adjustment_type::displayAll();
									foreach ($adjustment_type as $value) {
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Warehouse Name<strong style="color: red;">*</strong></label>
								<select name="warehouse_id" id="" class="form-select">
									<option value="">All Warehouse</option>
									<?php
									$warehouse = Warehouse::displayAll();
									foreach ($warehouse as $value) {
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>
	

							<div class="col-12">
								<button class="btn btn-primary" name="btnSubmit" type="submit"><i class="bi bi-save"></i> Save Stock_adjustment</button>
							</div>
						</form>

					</div>
				</div>
</main>