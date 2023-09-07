@extends('layouts.app')
@section('content')
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <h4 class="page-title">Edit Realization</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">KPI Realization</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit KPI Realization</li>
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
                                <h3 class="mb-2">Realization</h3>
                                <section>
                                    <h2 class="d-none">KPI Realization Information</h2>
                                    <form action="{{ route('realization.update', $realization->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="control-group form-group">
                                            <select name="period_id" class="form-select @error('period_id', $realization->period_id) is-invalid @enderror" aria-label="Default select example">
                                                @foreach ($period as $item)
                                                    <option value="{{ $item->id }}">{{ $item->month }} {{ $item->year }}</option>
                                                @endforeach
                                            </select>
                                            @error('period_id')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            
                                            <label class="form-label">realization</label>
                                            <input type="number"
                                                class="form-control required @error('value', $realization->value) is-invalid @enderror"
                                                value="{{ $realization->value }}" name="value" placeholder="">
                                            @error('value')
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
