<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">CREATE PRODUCT</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Add a new Product</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
				<a class="btn btn-primary" href="<?php echo $base_url ?>/product/index"><i class="bi bi-arrow-left"></i> Go Back</a>

			</div>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="row">
		<div class="col-xl-11 mx-auto">
			<div class="card">
				<div class="card-body">
					<h6 class="mb-0 text-uppercase">Add a new Product</h6>
					<div class="p-4 border rounded mt-4">

						<!-- Start From Validation -->

						<form action="<?php echo $base_url ?>/product/save" method="post" class="row g-4 needs-validation" novalidate="" enctype="multipart/form-data">

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Product Photo <strong style="color: red;">*</strong></label>
								<input type="file" name="photo" class="form-control" required="">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Product Name <strong style="color: red;">*</strong></label>
								<input type="text" name="name" class="form-control" required="required" placeholder="Product Name">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Manufacturers Name <strong style="color: red;">*</strong></label>

								<select name="manufacturer_id" id="manufacturer" class="form-select">
									<option value="">All Manufacturer</option>
									<?php  
									$manufacturer=Manufacturer::displayAll();
									foreach($manufacturer as  $value){
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>

								<!-- <input type="text" name="manufacturer_id" class="form-control" required="required" placeholder="Manufacturers Name"> -->
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Categories Name <strong style="color: red;">*</strong></label>

								<select name="categorie_id" id="" class="form-select">
									<option value="">All Categories</option>
									<?php  
									$categorie =Categories::displayAll();
									foreach($categorie as  $value){
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>
								
								<!-- <input type="text" name="categories_id" class="form-control" required="required" placeholder="Categories Name"> -->
								<div class="valid-feedback">Looks good!</div>
							</div>
							

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Sub Categories Name <strong style="color: red;">*</strong></label>

								<select name="sub_categorie_id" id="" class="form-select">
									<option value="">All Sub Categories</option>
									<?php  
									$subcategorie =SubCategory::all2();
									foreach($subcategorie as  $value){
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>
								
								<!-- <input type="text" name="categories_id" class="form-control" required="required" placeholder="Categories Name"> -->
								<div class="valid-feedback">Looks good!</div>
							</div>



							
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Is_brand <strong style="color: red;">*</strong></label>

								<select name="is_brand" id="" class="form-select">
									<option value="">Select Brand</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>

								<!-- <input type="text" name="is_brand" class="form-control" required="required" placeholder="Is_brand"> -->
								<div class="valid-feedback">Looks good!</div>
							</div>
							
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Is_feature <strong style="color: red;">*</strong></label>
								<select name="is_feature" id="" class="form-select">
									<option value="">Select Feature</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
								<!-- <input type="text" name="is_feature" class="form-control" required="required" placeholder="Is_feature"> -->
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">Barcode <strong style="color: red;">*</strong> </label>
								<input type="text" name="barcode" class="form-control" required="required" placeholder="Barchode">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">SKU <strong style="color: red;">*</strong></label>
								<input type="number" name="sku" class="form-control" required="required" placeholder="SKU">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">UOM Name <strong style="color: red;">*</strong></label>
								
								
								<select name="uom_id" id="" class="form-select">
									<option value="">All Uom</option>
									<?php  
									$uoms =Uom::displayAll();
									foreach($uoms as  $value){
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>
								
								
								<!-- <input type="text" name="uom_id" class="form-control" required="required" placeholder="UOM Name"> -->
								<div class="valid-feedback">Looks good!</div>
							</div>

							
							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">Size <strong style="color: red;">*</strong></label>
								<select name="size" id="" class="form-select">
									<option value="">All Size</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
									<option value="XXL">XXL</option>
								</select>
								<!-- <input type="text" name="size" class="form-control" required="required" placeholder="Size"> -->
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">Weight<strong style="color: red;">*</strong></label>
								<input type="text" name="weight" class="form-control" required="required" placeholder="Weight">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-3">
								<label for="validationCustom01" class="form-label">Price <strong style="color: red;">*</strong></label>
								<input type="number" name="price" class="form-control" required="required" placeholder="Price">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Offer_price <strong style="color: red;">*</strong></label>
								<input type="number" name="offer_price" class="form-control" required="required" placeholder="Offer_price">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Raw Materials<strong style="color: red;">*</strong></label>
								<input type="number" name="is_raw_material" class="form-control" required="required" placeholder="Raw_Materials">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Ratings <strong style="color: red;">*</strong></label>
								<input type="text" name="star" class="form-control" required="required" placeholder="Ratings">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">Description <strong style="color: red;">*</strong></label>
								<textarea class="form-control" id="validationTextarea" placeholder="Description" required="required" name="description" id=""></textarea>
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-12">
								<button class="btn btn-primary" name="btnSubmit" type="submit"><i class="bi bi-save"></i> Save Product</button>
							</div>
						</form>
						<!-- End From Validation -->
					</div>
				</div>
</main>
