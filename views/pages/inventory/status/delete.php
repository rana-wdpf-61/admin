<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">DELETE STATUS</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Delete Status</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
			<a class="btn btn-primary" href="<?php echo $base_url ?>/status/index"><i class="bi bi-arrow-left"></i> Go Back</a>

	<!-- <button type="button" class="btn btn-primary">Settings</button>
				<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <strong class="visually-hidden">Toggle Dropdown</strong>
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
			<div class="card">
				<div class="card-body">
				<h6 class="mb-0 text-uppercase">Delte Status</h6>
					<div class="p-4 border rounded mt-4">
						<form action="<?php echo $base_url ?>/status/delete_confirm" method="post" class="row g-3 needs-validation" novalidate="">


            <input type="hidden" name="id" class="form-control" value="<?php echo $status->id?>">


            <div class="col-md-6">
								<label for="validationCustom01" class="form-label">Status Id <strong style="color: red;">*</strong></label>
								<input disabled type="text" name="id" class="form-control" required="required" placeholder="Status id" value="<?php echo $status->id?>">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Status Name <strong style="color: red;">*</strong></label>
								<input disabled type="text" name="name" class="form-control" required="required" placeholder="Status Name" value="<?php echo $status->name?>">
								<div class="valid-feedback">Looks good!</div>
							</div>
		

							<div class="col-12">
								<button class="btn btn-primary" name="btnDelete" type="submit"><i class='bi bi-trash-fill'></i> Delete</button>
							</div>
						</form>
					</div>
				</div>
</main>