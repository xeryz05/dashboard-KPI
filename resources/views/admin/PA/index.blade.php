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
						<h4 class="page-title">Table Physical Availabilitys</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0);">Physical Availabilitys</a></li>
							<li class="breadcrumb-item active" aria-current="page">Table Physical Availabilitys</li>
						</ol>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center">
						<div class="pe-1 mb-xl-0">
							<a href="{{ route('PA.create') }}" class="btn btn-primary">Create Data</a>
						</div>
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
                                                    <th>No</th>
                                                    <th>Name Company</th>
                                                    <th>Periode</th>
                                                    <th>Tipe Pekerjaan</th>
                                                    <th>Target Pertahun</th>
                                                    <th>Januari</th>
                                                    <th>Februari</th>
                                                    <th>Maret</th>
                                                    <th>April</th>
                                                    <th>Target Perbulan</th>
                                                    <th>Persentase</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($PAs as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->company['name'] }}</td>
                                                        <td>{{ $item->period['month'] }}/{{ $item->period['year'] }}</td>
                                                        <td>{{ $item->type_jobs }}</td>
                                                        <td>Rp. {{ $item->target_pertahun }}</td>
                                                        <td>Rp. {{ $item->value_jan }}</td>
                                                        <td>Rp. {{ $item->value_feb }}</td>
                                                        <td>Rp. {{ $item->value_mar }}</td>
                                                        <td>Rp. {{ $item->value_apr }}</td>
                                                        <td>Rp. {{ $item->target_perbulan }}</td>
                                                        <td>{{ $item->persentase }}%</td>
                                                        {{-- <td>{{ $item->name }}</td> --}}
                                                        <td>
                                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('PA.destroy', $item->id) }}" method="POST">
                                                                <a href="{{ route('PA.edit', $item->id) }}" class="btn btn-sm btn-primary"><span class="fe fe-edit"></span></a>
                                                                <a href="{{ route('PA.show', $item->id) }}" class="btn btn-sm btn-info"><span class="fe fe-more-vertical"></span></a>
                                                            
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger"><span class="fe fe-trash-2"></span></button>
                                                            </form>
                                                        </td>
                                                    </tr>    
                                                @endforeach
                                            </tbody>
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