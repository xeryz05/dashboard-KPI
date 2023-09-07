@extends('layouts.app')
{{-- @extends('admin.dashboard') --}}
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <h4 class="page-title">KPI Realization</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">VE</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Table KPI Item Management</li>
                    </ol>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center">
                    <div class="pe-1 mb-xl-0">
                        {{-- <a href="{{ route('pdca.create') }}" class="btn btn-primary">Add KPI Item</a> --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Add KPI Item
                        </button>
                    </div>
                    <div class="pe-1 mb-xl-0">
                        <div class="btn-group">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Departement
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">PDCA</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Realization</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('pdca.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="area" class="form-label">Area</label>
                                    <input type="text" name="area" class="form-control" id="area">
                                </div>
                                <div class="mb-3">
                                    <label for="kpi" class="form-label">KPI Name</label>
                                    <input type="text" name="kpi" class="form-control" id="kpi">
                                </div>
                                <div class="mb-3">
                                    <select name="calculation" class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="cummulative">Cummulative</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="target" class="form-label">Target</label>
                                    <input type="number" name="target" class="form-control" id="target">
                                </div>
                                <div class="mb-3">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="number" name="weight" class="form-control" id="weight" max="100">
                                    <div id="weightHelp" class="form-text">isi dari 0 - 100</div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
            </div>
            <!-- breadcrumb -->
            <!-- Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                                    <thead>
                                        <tr>
                                            <th>Area</th>
                                            <th>KPI</th>
                                            <th>Calculation</th>
                                            <th>Target</th>
                                            <th>Weight</th>
                                            <th>Realization</th>
                                            <th>Created By</th>
                                            <th>Modified By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pdcas as $item)
                                            <tr>
                                                <td>Corporate</td>
                                                <td>Item</td>
                                                <td>Cumulative</td>
                                                <td>100</td>
                                                <td>80</td>
                                                <td>70</td>
                                                <td>daffa</td>
                                                <td>daffa</td>
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
