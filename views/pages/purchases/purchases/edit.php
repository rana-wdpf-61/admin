<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Edit PURCHASES</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Edit Purchases</li>
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
				<h6 class="mb-0 text-uppercase">Edit Purchases</h6>
					<div class="p-4 border rounded mt-4">

						<form action="<?php echo $base_url ?>/purchases/update" method="post" class="row g-3 needs-validation" novalidate="" enctype="multipart/form-data">


            <input type="hidden" name="id"  class="form-control" value="<?php echo $purchases->id ?>">

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Supplier Id <strong style="color: red;">*</strong></label>
								<input type="text" name="supplier_id" class="form-control" required="required" placeholder="Supplier Name"  value="<?php echo $purchases->supplier_id ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">product_id <strong style="color: red;">*</strong></label>
								<input type="text" name="product_id" class="form-control" required="required" placeholder="Supplier Name"  value="<?php echo $purchases->product_id ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">status_id<strong style="color: red;">*</strong></label>
								<input type="text" name="status_id" class="form-control" required="required" placeholder="Supplier Name"  value="<?php echo $purchases->status_id ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">order_total<strong style="color: red;">*</strong></label>
								<input type="number" name="order_total" class="form-control" required="required" placeholder="Supplier Name"  value="<?php echo $purchases->order_total ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">paid_amount<strong style="color: red;">*</strong></label>
								<input type="number" name="paid_amount" class="form-control" required="required" placeholder="Supplier Name"  value="<?php echo $purchases->paid_amount ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">discount <strong style="color: red;">*</strong></label>
								<input type="number" name="discount" class="form-control" required="required" placeholder="Supplier Name"  value="<?php echo $purchases->discount ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">vat <strong style="color: red;">*</strong></label>
								<input type="number" name="vat" class="form-control" required="required" placeholder="Supplier Name"  value="<?php echo $purchases->vat ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Delivery_date<strong style="color: red;">*</strong></label>
								<input type="text" name="delivery_date" class="form-control" required="required" placeholder="Delivery_date"  value="<?php echo $purchases->delivery_date ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">date<strong style="color: red;">*</strong></label>
								<input type="date" name="date" class="form-control" required="required" placeholder="Supplier Name"  value="<?php echo $purchases->date ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

								
							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">shipping_address <strong style="color: red;">*</strong></label>
								<textarea class="form-control" id="validationTextarea" placeholder="shipping_address" required="required" name="shipping_address" id=""><?php echo $purchases->shipping_address ?></textarea> 

								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">description <strong style="color: red;">*</strong></label>
								<textarea class="form-control" id="validationTextarea" placeholder="description" required="required" name="description" id=""><?php echo $purchases->description ?></textarea> 

								<div class="valid-feedback">Looks good!</div>
							</div>
							

							<div class="col-12">
								<button class="btn btn-primary" name="btnUpdate" type="submit"><i class="bi bi-save"></i> Save Changes</button>
							</div>
						</form>
					</div>
				</div>
</main>