<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">EDIT USER</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Edit User</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
				<a class="btn btn-primary" href="<?php echo $base_url ?>/user/index"><i class="bi bi-arrow-left"></i> Go Back</a>

			</div>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="row">
		<div class="col-xl-11 mx-auto">
			<div class="card">
				<div class="card-body">
					<h6 class="mb-0 text-uppercase">Edit user</h6>
					<div class="p-4 border rounded mt-4">

						<form action="<?php echo $base_url ?>/user/update" method="post" class="row g-4 needs-validation" novalidate="" enctype="multipart/form-data">

						<input type="hidden" name="id" class="form-control" value="<?php echo $user->id?>">

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Photo <strong style="color: red;">*</strong></label>

								<input type="file" name="photo" class="form-control" required="required" placeholder="Order_total" value="<?php echo $user->photo?>">

								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">User Name <strong style="color: red;">*</strong></label>
								<select name="name" id="name" class="form-select">
									<option value="">Select User Name</option>
									<option <?php echo (trim($user->name) == 'Super Admin') ? 'selected':''?> value="Super Admin">Super Admin</option>
									<option <?php echo (trim($user->name) == 'Admin') ? 'selected':''?> value="Admin">Admin</option>
									<option <?php echo (trim($user->name) == 'Manager') ? 'selected':''?> value="Manager">Manager</option>
								</select>
								<!-- <input type="text" name="name" class="form-control" required="required" placeholder="User Name"> -->
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label"> User Eamil <strong style="color: red;">*</strong></label>
								<input type="email" name="email" class="form-control" required="required" placeholder="User Eamil " value="<?php echo $user->email?>">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Phone Number<strong style="color: red;">*</strong></label>
								<input type="number" name="mobile" class="form-control" required="required" placeholder="Phone Number" value="<?php echo $user->mobile?>">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-12">
								<button class="btn btn-primary" name="btnUpdate" type="submit"><i class="bi bi-save"></i> Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>