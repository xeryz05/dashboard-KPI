@extends('layouts.admin')
@section('content')
    <div class="main-content app-content">

				<!-- container -->
				<div class="main-container container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<h4 class="page-title">Edit Event</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0);">Event</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Name Event</li>
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
										<h3 class="mb-2">Event Information</h3>
										<section>
											<h2 class="d-none">Event Information</h2>
											<form action="{{ route('events.update', $event->id) }}" method="post" enctype="multipart/form-data">
												@csrf
												@method('PUT')

												<div class="control-group form-group">
													<label class="form-label">Start</label>
													<input type="text" class="form-control required @error('start', $event->start) is-invalid @enderror" value="{{ $event->start }}" name="start" placeholder="Start">
													@error('start')
														<div class="alert alert-danger mt-2">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="control-group form-group">
													<label class="form-label">End</label>
													<input type="text" class="form-control required @error('end', $event->end) is-invalid @enderror" value="{{ $event->end }}" name="end" placeholder="End">
													@error('end')
														<div class="alert alert-danger mt-2">
															{{ $message }}
														</div>
													@enderror
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