<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">CREATE USER</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Add a new User</li>
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
					<h6 class="mb-0 text-uppercase">Add a new user</h6>
					<div class="p-4 border rounded mt-4">

						<form action="<?php echo $base_url ?>/user/save" method="post" class="row g-4 needs-validation" novalidate="" enctype="multipart/form-data">

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Photo <strong style="color: red;">*</strong></label>

								<input type="file" name="photo" class="form-control" required="required" placeholder="Order_total">

								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">User Name <strong style="color: red;">*</strong></label>
								<select name="name" id="name" class="form-select">
									<option value="">Select User Name</option>
									<option value="Super Admin">Super Admin</option>
									<option value="Admin">Admin</option>
									<option value="Manager">Manager</option>
								</select>
								<!-- <input type="text" name="name" class="form-control" required="required" placeholder="User Name"> -->
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label"> User Eamil <strong style="color: red;">*</strong></label>
								<input type="email" name="email" class="form-control" required="required" placeholder="User Eamil ">
								<div class="valid-feedback">Looks good!</div>
							</div>

							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Phone Number<strong style="color: red;">*</strong></label>
								<input type="number" name="mobile" class="form-control" required="required" placeholder="Phone Number">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-12">
								<button class="btn btn-primary" name="btnSubmit" type="submit"><i class="bi bi-save"></i> Save user</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>