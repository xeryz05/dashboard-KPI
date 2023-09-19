@extends('layouts.admin')
{{-- @extends('admin.dashboard') --}}
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@section('style')
    <style>
        .btn-primary{
            background: lightseagreen;
            box-shadow: 0 0 1px #ccc;
            -webkit-transition: all 0.5s ease-in-out;
            border: 0px;
            color: #fff;
        }
        .btn-danger{
            background: rgb(212, 103, 25);
            box-shadow: 0 0 1px #ccc;
            -webkit-transition: all 0.5s ease-in-out;
            border: 0px;
            color: #fff;
        }
        .btn-sm:hover{
            -webkit-transform: scale(1.1);
            /* background: #31708f; */
        }
    </style>
@endsection 
@section('content')
    <!-- main-content -->
			<div class="main-content app-content">

				<!-- container -->
				<div class="main-container container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<h4 class="page-title">Table Roles</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0);">Roles</a></li>
							<li class="breadcrumb-item active" aria-current="page">Table Roles</li>
						</ol>
					</div>
                    <div class="d-flex my-xl-auto right-content align-items-center">
						<div class="pe-1 mb-xl-0">
							<a href="{{ route('role.create') }}" class="btn btn-primary">Create Data</a>
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
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        {{-- <td>{{ $loop->id }}</td> --}}
                                                        <td>{{ $item->name }}</td>
                                                        <td>
                                                            <a href="{{ route('role.edit', $item->id) }}" class="btn btn-sm btn-primary"><span class="fe fe-edit"></span></a>
                                                            <form action="{{ route('role.destroy', $item->id) }}" method="post" onsubmit="return confirm('Are You Sure?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger" type="submit"><span class="fe fe-trash-2"></span></button>
                                                            </form>
                                                        </td>
                                                    </tr>    
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <span style="font-size: 10px">sebaiknya tidak diedit karena harus merubah logic lagi</span>
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