@extends('layouts.admin')
{{-- @extends('admin.dashboard') --}}
@section('style')

@endsection
@section('content')
    <!-- main-content -->
			<div class="main-content app-content">

				<!-- container -->
				<div class="main-container container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<h4 class="page-title">Table Revenues</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0);">Revenue Verdanco Indonesia</a></li>
							<li class="breadcrumb-item active" aria-current="page">Table Revenues</li>
						</ol>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center">
                        <div class="pe-1 mb-xl-0">
                            <a href="{{ route('profits.create') }}" class="btn btn-primary">Create Data</a>
                        </div>

                        <!-- Button trigger modal -->
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
                            <form action="#" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input name="file" type="file">
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
                    </div>
				</div>
				<!-- breadcrumb -->
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Revenue Verdanco Indonesia</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Event</th>
                                                    <th>value</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($profits as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->event['start'] }} - {{ $item->event['end'] }}</td>
                                                        <td>Rp. {{ number_format($item->value) }}</td>
                                                        <td>
                                                            {{-- @if ($item->Verev()->count() > 0)
                                                                Tidak bisa dihapus
                                                            @else --}}
                                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('profits.destroy', $item->id) }}" method="POST">
                                                                <a href="{{ route('profits.edit', $item->id) }}" class="btn btn-sm btn-primary"><span class="fe fe-edit"></span></a>
                                                                <a href="{{ route('profits.show', $item->id) }}" class="btn btn-sm btn-info"><span class="fe fe-more-vertical"></span></a>
                                                            
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger"><span class="fe fe-trash-2"></span></button>
                                                            </form>
                                                            {{-- @endif --}}
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
@section('script')
    {{-- <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/fc-4.2.2/fh-3.3.2/r-2.4.1/sc-2.1.1/datatables.min.js"></script>   --}}
    <script src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/fh-3.3.2/r-2.4.1/sb-1.4.2/sp-2.1.2/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                fixedHeader: true
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