@extends('layouts.admin')
@section('style')
    <style>
        .zoom{
            transition: transform 1.0s;
        }
        .zoom:hover {
            transform: scale(1.1); 
            transition: transform 1.0s ease;
        }
    </style>
@endsection
@section('content')
    <div class="main-content app-content">

				<!-- container -->
				<div class="main-container container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<h4 class="page-title">Admin</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0);">Admin Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page"></li>
						</ol>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center">
                    </div>
				</div>
				<!-- breadcrumb -->
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-primary-gradient zoom">
								<div class="px-3 pt-3  pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">Users</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 fw-bold mb-1 text-white">{{ $CountUsers }}</h4>
												<p class="mb-0 tx-12 text-white op-7">User Registrations</p>
											</div>
											<span class="float-end my-auto ms-auto text-white">
												<i class="si si-user fs-3"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-danger-gradient zoom">
								<div class="px-3 pt-3  pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">Visitor</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 fw-bold mb-1 text-white"></h4>
												<p class="mb-0 tx-12 text-white op-7">Unique Visitors</p>
											</div>
											<span class="float-end my-auto ms-auto text-white">
												<i class="si si-people fs-3"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-success-gradient">
								<div class="px-3 pt-3  pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">---</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 fw-bold mb-1 text-white">---</h4>
												<p class="mb-0 tx-12 text-white op-7">---</p>
											</div>
											<span class="float-end my-auto ms-auto">
												<i class="fas fa-arrow-circle-up text-white"></i>
												<span class="text-white op-7"> ---</span>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-warning-gradient">
								<div class="px-3 pt-3  pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">---</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 fw-bold mb-1 text-white">---</h4>
												<p class="mb-0 tx-12 text-white op-7">---</p>
											</div>
											<span class="float-end my-auto ms-auto">
												<i class="fas fa-arrow-circle-up text-white"></i>
												<span class="text-white op-7"> ---</span>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						
                    </div>
                    <!-- End Row -->
				</div>
				<!-- Container closed -->
			</div>
@endsection
@section('script')
    
@endsection