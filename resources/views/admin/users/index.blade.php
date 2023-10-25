@extends('layouts.admin')
{{-- @extends('admin.dashboard') --}}
@section('style')
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/datatables.min.css"
        rel="stylesheet"
    />
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
                        <li
                            class="breadcrumb-item active"
                            aria-current="page"
                        >Edit Tables</li>
                    </ol>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center">
                    <div class="mb-xl-0 pe-1">
                        <a
                            class="btn btn-primary"
                            href="{{ route('users.create') }}"
                        >Create Data</a>
                    </div>
                </div>
            </div>
            <!-- breadcrumb -->
            <!-- Row -->
            <div class="row">
                <div class="col-lg-12">
                    {{-- <p class="d-inline-flex gap-1">
                        <a
                            class="btn si si-plus"
                            data-bs-toggle="collapse"
                            href="#collapseExample"
                            role="button"
                            aria-expanded="false"
                            aria-controls="collapseExample"
                        >
                            Select Department
                        </a>
                    </p>
                    <div
                        class="collapse"
                        id="collapseExample"
                    >
                        <div class="card card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @foreach ($user->departement()->get() as $dept)
                                                    <button class="btn btn-sm btn-primary me-2">{{ $dept->name }}</button>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit User Table</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                    class="table-bordered text-nowrap mb-0 table border"
                                    id="example"
                                    id="basic-edit"
                                >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Reg</th>
                                            <th>Name</th>
                                            <th>E-Mail</th>
                                            <th>Departement</th>
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
                                                    @foreach ($item->departement()->get() as $dept)
                                                        <button class="btn btn-sm btn-primary me-2">{{ $dept->name }}</button>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <form
                                                        onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('users.destroy', $item->id) }}"
                                                        method="POST"
                                                    >
                                                        <a
                                                            class="btn btn-sm btn-info"
                                                            href="{{ route('users.show', $item->id) }}"
                                                        >Role<span class="fe fe-more-vertical"></span></a>
                                                        <a
                                                            class="btn btn-sm btn-primary"
                                                            href="{{ route('users.edit', $item->id) }}"
                                                        ><span class="fe fe-edit"></span></a>
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
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/datatables.min.js"
    ></script>
@endsection
