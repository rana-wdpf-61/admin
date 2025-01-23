<main class="container">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">DELETE UOM</div>

		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Delete Uom</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
			<a class="btn btn-primary" href="<?php echo $base_url ?>/uom/index"><i class="bi bi-arrow-left"></i> Go Back</a>

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
				<h6 class="mb-0 text-uppercase">Delte Uom</h6>
					<div class="p-4 border rounded mt-4">
						<form action="<?php echo $base_url ?>/uom/delete_confirm" method="post" class="row g-3 needs-validation" novalidate="">


            <input type="hidden" name="id" class="form-control" value="<?php echo $uom->id?>">


            <div class="col-md-6">
								<label for="validationCustom01" class="form-label">Uom Id <strong style="color: red;">*</strong></label>
								<input disabled type="text" name="id" class="form-control" required="required" placeholder="Uom id" value="<?php echo $uom->id?>">
								<div class="valid-feedback">Looks good!</div>
							</div>


							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Uom Name <strong style="color: red;">*</strong></label>
								<input disabled type="text" name="name" class="form-control" required="required" placeholder="uom Name" value="<?php echo $uom->name?>">
								<div class="valid-feedback">Looks good!</div>
							</div>
		

							<div class="col-12">
								<button class="btn btn-primary" name="btnDelete" type="submit"><i class='bi bi-trash-fill'></i> Delete</button>
							</div>
						</form>
					</div>
				</div>
</main>