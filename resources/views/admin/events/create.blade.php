
@extends('layouts.admin')
@section('style')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
@section('content')
    <div class="main-content app-content">

				<!-- container -->
				<div class="main-container container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<h4 class="page-title">Create Periode</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0);">Periode</a></li>
							<li class="breadcrumb-item active" aria-current="page">Create Periode</li>
						</ol>
					</div>
				</div>
				
				<!-- breadcrumb -->

                <!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="card-body">
									<p class="mg-b-20"></p>
									<div id="wizard1">
										<h3 class="mb-2">Periode Information</h3>
										<section>
											<form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
												@csrf
												<div class="container mt-5">
													<label for="start">Start:</label>
													<input type="text" id="bulan_tahun" name="start" class="form-control" data-flatpickr='{"dateFormat": "M-Y", "minDate": "2000-01"}'>
													@error('start')
														<div class="alert alert-danger mt-2">
															{{ $message }}
														</div>
													@enderror
												</div>
												
												<div class="mb-3">
													<label for="end" class="form-label">End</label>
													<input type="text" id="bulan_tahun" name="end" class="form-control" data-flatpickr='{"dateFormat": "M-Y", "minDate": "2000-01"}'>
													@error('end')
														<div class="alert alert-danger mt-2">
															{{ $message }}
														</div>
													@enderror
												</div>
												</div>
												<div class="d-flex my-xl-auto right-content align-items-center">
													<div class="pe-1 mb-xl-0">
														<button class="btn btn-primary">Create Data</button>
													</div>
												</div>
											</form>
										</section>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- Container closed -->
			</div>
@endsection
@section('script')
<script>
flatpickr("#bulan_tahun", {
    dateFormat: "M-Y",
    minDate: "2000-01",
    // ... tambahkan opsi lainnya ...
});
</script>

@endsection