@extends('layouts.main')
{{-- @extends('admin.dashboard') --}}
@section('content')
    <!-- main-content -->
			<div class="main-content app-content">

				<!-- container -->
				<div class="main-container container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<h4 class="page-title">Table Departements</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0);">Departements</a></li>
							<li class="breadcrumb-item active" aria-current="page">Table Departements</li>
						</ol>
					</div>
				</div>
				<!-- breadcrumb -->
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Basic Edit Table</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                                            <thead>
                                                <tr>
                                                    <th>Name Departement</th>
                                                    <th>Name User In Departement</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($departement as $item) --}}
                                                    <tr>
                                                        <td>{{ $departement->name }}</td>
                                                        <td>
                                                            @foreach ($departement->user as $data)
                                                                - {{$data['name']}} <br>
                                                            @endforeach
                                                        </td>
                                                    </tr>    
                                                {{-- @endforeach --}}
                                            </tbody>
                                            <div class="d-flex my-xl-auto right-content align-items-center">
                                                <div class="pe-1 mb-xl-0">
                                                    <a href="{{ route('departements.index') }}" class="btn btn-primary">Back</a>
                                                </div>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
				</div>
				<!-- Container closed -->
			</div>
			<!-- main-content closed -->
@endsection