@section('style')
    <style>
		.ui-datepicker-calendar {
			display: none;
			position: absolute;
		}
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@endsection
@extends('layouts.app')
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
											<h2 class="d-none">Departement Information</h2>
											<form action="{{ route('periods.store') }}" method="post" enctype="multipart/form-data">
												@csrf
												<div class="mb-3">
												<label for="month" class="form-label">Month</label>
												<input class="month-own form-control" style="width: 300px;" type="text" name="month" id="month">
													@error('month')
														<div class="alert alert-danger mt-2">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="mb-3">
													<label for="year" class="form-label">year</label>
													<input class="date-own form-control" style="width: 300px;" type="text" name="year" id="year">
													@error('year')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script>
           $('.date-own').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
    </script>
	<script>
           $('.month-own').datepicker({
         format: "MM",
		viewMode: "months", 
		minViewMode: "months"
       });
    </script>
@endsection