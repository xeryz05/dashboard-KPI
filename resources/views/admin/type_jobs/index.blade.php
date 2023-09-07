@extends('layouts.main')
{{-- @extends('admin.dashboard') --}}
@section('style')
    <link href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/fc-4.2.2/fh-3.3.2/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/datatables.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <!-- main-content -->
			<div class="main-content app-content">

				<!-- container -->
				<div class="main-container container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<h4 class="page-title">Table Job Type</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0);">Job Type</a></li>
							<li class="breadcrumb-item active" aria-current="page">Table Job Types</li>
						</ol>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center">
						<div class="pe-1 mb-xl-0">
							<a href="{{ route('type_jobs.create') }}" class="btn btn-primary">Create Data</a>
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
                                        <table class="table table-bordered border text-nowrap mb-0" id="example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($type_jobs as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>
                                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('type_jobs.destroy', $item->id) }}" method="POST">
                                                                <a href="{{ route('type_jobs.edit', $item->id) }}" class="btn btn-sm btn-primary"><span class="fe fe-edit"></span></a>
                                                                {{-- <a href="{{ route('companies.show', $item->id) }}" class="btn btn-sm btn-info"><span class="fe fe-more-vertical"></span></a> --}}
                                                            
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
            @section('script')
                <script src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/fc-4.2.2/fh-3.3.2/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/datatables.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#example').DataTable( {
                            autoFill: true,
                            dom: 'Bfrtip',
                            buttons: [
                                'copyHtml5',
                                'excelHtml5',
                                'csvHtml5',
                                'pdfHtml5'
                            ]
                        } );
                    } );
                </script>
            @endsection
@endsection