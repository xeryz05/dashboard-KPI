@extends('layouts.admin')
@section('style')
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/fc-4.2.2/fh-3.3.2/r-2.4.1/sc-2.1.1/datatables.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <!-- main-content -->
			<div class="main-content app-content">

				<!-- container -->
				<div class="main-container container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<h4 class="page-title">Table Revenue VI</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0);">Revenue VI</a></li>
							<li class="breadcrumb-item active" aria-current="page">Table Revenue VI</li>
						</ol>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center">
                        <div class="pe-1 mb-xl-0">
                            <a href="{{ route('virevs.create') }}" class="btn btn-primary">Create Data</a>
                        </div>
                        <div class="pe-1 mb-xl-0">
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Import
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Input Revenue</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('virevs.import') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                            <input type="file" name="file">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        {{-- end modal --}}
                    </div>
				</div>
				<!-- breadcrumb -->
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Periode</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Periode</th>
                                                    <th>Tipe Pekerjaan</th>
                                                    <th>Value</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($virevs as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->event['start'] }}</td>
                                                        <td>{{ $item->job['name'] }}</td>
                                                        <td>{{'Rp' . number_format($item->value) }}</td>
                                                        <td>
                                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('virevs.destroy', $item->id) }}" method="POST">
                                                                <a href="{{ route('virevs.edit', $item->id) }}" class="btn btn-sm btn-primary"><span class="fe fe-edit"></span></a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger"><span class="fe fe-trash-2"></span></button>
                                                            </form>
                                                        </td>
                                                    </tr>    
                                                @endforeach
                                                {{-- @dd($item) --}}
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
@section('script')
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/fc-4.2.2/fh-3.3.2/r-2.4.1/sc-2.1.1/datatables.min.js"></script>  
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });    
    </script> 
@endsection