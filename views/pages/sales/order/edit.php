<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">EDIT ORDER</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Edit Order</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
			<a class="btn btn-primary" href="<?php echo $base_url ?>/order/index"><i class="bi bi-arrow-left"></i> Go Back</a>

			</div>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="row">
		<div class="col-xl-11 mx-auto">
			<div class="card">
				<div class="card-body">
				<h6 class="mb-0 text-uppercase">Edit Order</h6>
					<div class="p-4 border rounded mt-4">

						<form action="<?php echo $base_url ?>/order/update" method="post" class="row g-4 needs-validation" novalidate="" enctype="multipart/form-data">

						<input type="hidden" class="form-label" name="id" value="<?php echo $order->id ?>">

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Customar Name<strong style="color: red;">*</strong></label>
								<select name="customars_id" id="" class="form-select">
									<option value="<?php echo $order->delivery_date ?>">Select Suppliers_id</option>
									<?php  
									$supplierss=Supplier::displayAll();
									foreach($supplierss as $value){
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Order_total <strong style="color: red;">*</strong></label>
								
								<input type="number" name="order_total" class="form-control" required="required" placeholder="Order_total" value="<?php echo $order->order_total ?>">

								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Uom Name<strong style="color: red;">*</strong></label>

								<select name="uom_id" id="" class="form-select">
									<option value="<?php echo $order->uom_id ?>">All UOM</option>
									<?php  
									$uom=Uom::displayAll();
									foreach($uom as $value){
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>

								<!-- <input type="text" name="uom_id" class="form-control" required="required" placeholder=""> -->
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Discount <strong style="color: red;">*</strong></label>
								<input type="number" name="discount" class="form-control" required="required" placeholder="Discount" value="<?php echo $order->discount ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							
							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Vat <strong style="color: red;">*</strong></label>
								<input type="number" name="vat" class="form-control" required="required" placeholder="Vat" value="<?php echo $order->vat ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Paid_amount<strong style="color: red;">*</strong></label>
								<input type="number" name="paid_amount" class="form-control" required="required" placeholder="Paid_amount" value="<?php echo $order->paid_amount ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Status_id<strong style="color: red;">*</strong></label>

								<select name="status_id" id="" class="form-select">
									<option value="<?php echo $order->status_id ?>">All Status</option>
									<?php  
									$status=Status::displayAll();
									foreach($status as $value){
										echo "<option value='$value[0]'>$value[1]</option>";
									}
									?>
								</select>


								<!-- <input type="text" name="status_id" class="form-control" required="required" placeholder="Supplier Name"> -->
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Order Date<strong style="color: red;">*</strong></label>
								<input type="date" name="order_date" class="form-control" required="required" placeholder="" value="<?php echo $order->order_date ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">Delivery_date<strong style="color: red;">*</strong></label>
								<input type="date" name="delivery_date" class="form-control" required="required" placeholder="" value="<?php echo $order->delivery_date ?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

								
							<div class="col-md-12">
								<label for="validationCustom01" class="form-label">Shipping_address <strong style="color: red;">*</strong></label>
								<textarea class="form-control" id="validationTextarea" placeholder="Shipping_address" required="required" name="shipping_address" id=""><?php echo $order->shipping_address?></textarea> 

								<div class="valid-feedback">Looks good!</div>
							</div>
							

							<div class="col-12">
								<button class="btn btn-primary" name="btnUpdate" type="submit"><i class="bi bi-save"></i> Save Changes</button>
							</div>
						</form>
					</div>
				</div>
</main>