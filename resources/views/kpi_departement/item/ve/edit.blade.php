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
                                    <form action="{{ route('veitem.update', $veitem->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="control-group form-group">
                                            <label class="form-label">Departement</label>
                                            <input type="text"
                                                class="form-control required"
                                                value="{{ $veitem->departement['name'] }}" name="departement_id" placeholder="Departement">
                                            <label class="form-label">Departement</label>
                                            <input type="text"
                                                class="form-control required"
                                                value="{{ $veitem->period['month'] }} {{ $veitem->period['year'] }}" name="period_id">

                                            <label class="form-label">Area</label>
                                            <input type="text"
                                                class="form-control required @error('area', $veitem->area) is-invalid @enderror"
                                                value="{{ $veitem->area }}" name="area" placeholder="area">
                                            @error('area')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label">KPI</label>
                                            <input type="text"
                                                class="form-control required @error('kpi', $veitem->kpi) is-invalid @enderror"
                                                value="{{ $veitem->kpi }}" name="kpi" placeholder="kpi name">
                                            @error('kpi')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label">Calculation</label>
                                            <div class="mb-3">
                                                <select name="calculation" class="form-select" aria-label="Default select example">
                                                    <option selected>Open this select menu</option>
                                                    <option value="cummulative">Cummulative</option>
                                                </select>
                                            </div>
                                            @error('calculation')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label">Target</label>
                                            <input type="number"
                                                class="form-control required @error('target', $veitem->target) is-invalid @enderror"
                                                value="{{ $veitem->target }}" name="target" placeholder="target">
                                            @error('target')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label">Weight</label>
                                            <input type="number"
                                                class="form-control required @error('weight', $veitem->weight) is-invalid @enderror"
                                                value="{{ $veitem->weight }}" name="weight" placeholder="weight">
                                            @error('Weight')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label">realization</label>
                                            <input type="number"
                                                class="form-control required @error('realization', $veitem->realization) is-invalid @enderror"
                                                value="{{ $veitem->realization }}" name="realization" placeholder="">
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
