@extends('layouts.admin')
@section('content')
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <h4 class="page-title">Edit Name Company</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Company</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Name Company</li>
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
                                <h3 class="mb-2">Comapny Information</h3>
                                <section>
                                    <h2 class="d-none">Company Information</h2>
                                    <form action="{{ route('companies.update', $company->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="control-group form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text"
                                                class="form-control required @error('name', $company->name) is-invalid @enderror"
                                                value="{{ $company->name }}" name="name" placeholder="Name">
                                            @error('name')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="d-flex my-xl-auto right-content align-items-center">
                                            <div class="pe-1 mb-xl-0">
                                                <button class="btn btn-primary">Create Data</button>
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
