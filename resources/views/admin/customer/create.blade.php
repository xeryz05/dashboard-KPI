@extends('layouts.main')
@section('content')
    <div class="main-content app-content">

				<!-- container -->
				<div class="main-container container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<h4 class="page-title">Create User</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
							<li class="breadcrumb-item active" aria-current="page">Create User</li>
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
										<h3 class="mb-2">Personal Information</h3>
										<section>
										<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
											@csrf
											<div class="form-group">
												<label class="font-weight-bold">Name</label>
												<input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
											
												<!-- error message untuk title -->
												@error('name')
													<div class="alert alert-danger mt-2">
														{{ $message }}
													</div>
												@enderror
											</div>

											<div class="form-group">
												<label class="font-weight-bold">Email</label>
												<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
											
												<!-- error message untuk title -->
												@error('email')
													<div class="alert alert-danger mt-2">
														{{ $message }}
													</div>
												@enderror
											</div>
											<div class="form-group">
												<label class="font-weight-bold">Password</label>
												<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Masukkan Passwoord">
											
												<!-- error message untuk title -->
												@error('password')
													<div class="alert alert-danger mt-2">
														{{ $message }}
													</div>
												@enderror
											</div>
											<div class="form-group">
												<label class="font-weight-bold">Company</label>
												<select name="company_id" class="form-select" aria-label="Default select example">
													<option selected>Open this select menu</option>
													@foreach ($companies as $item)
														<option value="{{ $item->id }}">{{ $item->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label class="font-weight-bold">Departement</label>
												<select name="departement_id" class="form-select" aria-label="Default select example">
													<option selected>Open this select menu</option>
													@foreach ($departements as $item)
														<option value="{{ $item->id }}">{{ $item->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label class="font-weight-bold">Role</label>
												<select name="role_id" class="form-select" aria-label="Default select example">
													<option selected>Open this select menu</option>
													@foreach ($roles as $item)
														<option value="{{ $item->id }}">{{ $item->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label class="font-weight-bold">Position</label>
												<input type="text" class="form-control @error('position') is-invalid @enderror" name="position">
											
												<!-- error message untuk title -->
												@error('position')
													<div class="alert alert-danger mt-2">
														{{ $message }}
													</div>
												@enderror
											</div>
											<div class="pe-1 mb-xl-0">
												<button class="btn btn-primary">Create Data</button>
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