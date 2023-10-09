@extends('layouts.admin')
{{-- @extends('admin.dashboard') --}}
@section('style')
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/datatables.min.css"
        rel="stylesheet" />
@endsection
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <h4 class="page-title">Tables</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Tables</li>
                    </ol>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center">
                    <div class="pe-1 mb-xl-0">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Create Data</a>
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
                                <table id="example" class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Reg</th>
                                            <th>Name</th>
                                            <th>E-Mail</th>
                                            {{-- <th>Departement</th> --}}
                                            {{-- <th>Role</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->noreg }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('users.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('users.show', $item->id) }}"
                                                            class="btn btn-sm btn-info">Role<span
                                                                class="fe fe-more-vertical"></span></a>
                                                        <a href="{{ route('users.edit', $item->id) }}"
                                                            class="btn btn-sm btn-primary"><span
                                                                class="fe fe-edit"></span></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"><span
                                                            class="fe fe-trash-2"></span>
                                                        </button>
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
@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/datatables.min.js">
    </script>
@endsection
