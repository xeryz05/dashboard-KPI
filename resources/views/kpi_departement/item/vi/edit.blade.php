@extends('layouts.admin')
@section('content')
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <h4 class="page-title">Edit Name Item</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">KPI Item</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit KPI Item</li>
                    </ol>
                </div>
            </div>

            <!-- breadcrumb -->

            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="mg-b-20"></p>
                            <div id="wizard1">
                                <h3 class="mb-2">Departemen Information</h3>
                                <section>
                                    <h2 class="d-none">Departement Information</h2>
                                    <form action="{{ route('viitem.update', $viitem->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="control-group form-group">
                                            <label class="form-label">Departement</label>
                                            <input type="text"
                                                class="form-control required"
                                                value="{{ $viitem->departement['name'] }}" name="departement_id" placeholder="Departement" disabled>
                                            <label class="form-label">Area</label>
                                            <label class="form-label">Area</label>
                                            <input type="text"
                                                class="form-control required @error('area', $viitem->area) is-invalid @enderror"
                                                value="{{ $viitem->area }}" name="area" placeholder="area">
                                            @error('area')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label">KPI</label>
                                            <input type="text"
                                                class="form-control required @error('kpi', $viitem->kpi) is-invalid @enderror"
                                                value="{{ $viitem->kpi }}" name="kpi" placeholder="kpi name">
                                            @error('kpi')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label">Calculation</label>
                                            <input type="text"
                                                class="form-control required @error('calculation', $viitem->calculation) is-invalid @enderror"
                                                value="{{ $viitem->calculation }}" name="calculation" placeholder="Calculation">
                                            @error('calculation')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label">Target</label>
                                            <input type="number"
                                                class="form-control required @error('target', $viitem->target) is-invalid @enderror"
                                                value="{{ $viitem->target }}" name="target" placeholder="target">
                                            @error('target')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label">Weight</label>
                                            <input type="number"
                                                class="form-control required @error('weight', $viitem->weight) is-invalid @enderror"
                                                value="{{ $viitem->weight }}" name="weight" placeholder="weight">
                                            @error('Weight')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label">realization</label>
                                            <input type="number"
                                                class="form-control required @error('realization', $viitem->realization) is-invalid @enderror"
                                                value="{{ $viitem->realization }}" name="realization" placeholder="">
                                            @error('realization')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="d-flex my-xl-auto right-content align-items-center">
                                            <div class="pe-1 mb-xl-0">
                                                <button class="btn btn-primary">Edit Data</button>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- Container closed -->
    </div>
@endsection
