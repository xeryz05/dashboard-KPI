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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">VI</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Table KPI Realization</li>
                    </ol>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center">
                    <div class="pe-1 mb-xl-0">
                        {{-- <a href="{{ route('pdca.create') }}" class="btn btn-primary">Add KPI Item</a> --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#ModalAdd">
                            <i
                            class="bi bi-plus"></i> Add KPI Realization
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
            <!-- Modal add item-->
            <div class="modal fade" id="ModalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('realization.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <select name="period_id" class="form-select" aria-label="Default select example">
                                        <option selected>Period</option>
                                        @foreach ($periods as $item)
                                            <option value="{{ $item->id }}">{{ $item->month }} {{ $item->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Area</th>
                                            <th scope="col">KPI</th>
                                            <th scope="col">Weight</th>
                                            <th scope="col">Realization</th>
                                            <th scope="col">Target</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($kpipdca as $row)
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{ $row->area }}</td>
                                                    <td>{{ $row->kpi }}</td>
                                                    <td>{{ $row->weight }}</td>
                                                    <td>
                                                        <div class="mb-3">
                                                            <label for="value" class="form-label">Realization</label>
                                                            <input type="number" name="value" class="form-control" id="value">
                                                        </div>
                                                    </td>
                                                    <td>{{ $row->target }}</td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal add item -->
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
                                            <th>No</th>
                                            <th>Periode</th>
                                            <th>kpi item</th>
                                            <th>Realization</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($realization as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->period['month'] }} {{ $item->period['year'] }}</td>
                                                <td>{{ $item->kpipdca['kpi'] }}</td>                                                    
                                                <td>{{ $item->value }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('realization.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('realization.edit', $item->id) }}"
                                                            class="btn btn-sm btn-primary"><span
                                                                class="fe fe-edit"></span>
                                                        </a>
                                                        <a href="{{ route('kpipdca.show', $item->id) }}"
                                                            class="btn btn-sm btn-info"><span
                                                                class="fe fe-more-vertical"></span></a>

                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"><span
                                                                class="fe fe-trash-2"></span></button>
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
