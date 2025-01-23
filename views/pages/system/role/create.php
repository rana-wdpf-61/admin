<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Forms</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Validations</li>
				</ol>
			</nav>
		</div>
		<div class="ms-auto">
			<div class="btn-group">
			<a class="btn btn-primary" href="<?php echo $base_url ?>/product/index">Back</a>
				<!-- <button type="button" class="btn btn-primary">Settings</button>
				<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
				</button>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
					<a class="dropdown-item" href="javascript:;">Another action</a>
					<a class="dropdown-item" href="javascript:;">Something else here</a>
					<div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
				</div> -->
			</div>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="row">
		<div class="col-xl-11 mx-auto">
			<h6 class="mb-0 text-uppercase">Basic Validation</h6>
			<hr>
			<div class="card">
				<div class="card-body">
					<div class="p-4 border rounded">
						<form action="<?php echo $base_url ?>/product/save" method="post" class="row g-3 needs-validation" novalidate="">

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Name</label>
								<input type="text" name="name" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Photo</label>
								<input type="file" name="photo" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">Price</label>
								<input type="number" name="price" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">Offer_price</label>
								<input type="number" name="offer_price" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">Categories_id</label>
								<input type="text" name="categories_id" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">UOM_id</label>
								<input type="text" name="uom_id" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">Barcode</label>
								<input type="text" name="barcode" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">SKU</label>
								<input type="number" name="sku" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">Manufacturer_id</label>
								<input type="text" name="manufacturer_id" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">Star</label>
								<input type="text" name="star" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">Description</label>
								<!-- <input type="text" name="description" class="form-control" required=""> -->
								<textarea class="form-control" id="validationTextarea" placeholder="" required="" name="description" id=""></textarea>
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Weight</label>
								<input type="text" name="weight" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Size</label>
								<input type="text" name="size" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Is_feature</label>
								<input type="text" name="is_feature" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">is_brand</label>
								<input type="text" name="is_brand" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-12">
								<button class="btn btn-primary" name="btnSubmit" type="submit">Submit Data</button>
							</div>
						</form>
					</div>
				</div>
</main>