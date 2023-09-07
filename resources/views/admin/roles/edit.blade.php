@extends('layouts.app')
@section('content')
    @if ($message = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('gagal'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('peringatan'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <h4 class="page-title">Edit Role</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Role</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
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
                                <h3 class="mb-2">Role Information</h3>
                                <section>
                                    <h2 class="d-none">Role Information</h2>
                                    <form action="{{ route('role.update', $role->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="control-group form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text"
                                                class="form-control required @error('name', $role->name) is-invalid @enderror"
                                                value="{{ $role->name }}" name="name" placeholder="Name">
                                            @error('name')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="d-flex my-xl-auto right-content align-items-center">
                                            <div class="pe-1 mb-xl-0">
                                                <button class="btn btn-primary">Create Data</button>
                                                <a href="{{ route('role.index') }}" class="btn btn-warning">Back</a>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <p class="mg-b-20"></p>
                            <div id="wizard1">
                                <h3 class="mb-2">Permission Information</h3>
                                <div class="col-lg-12">
                                    <div class="m-3 d-flex">
                                        @if ($role->permissions)
                                            @foreach ($role->permissions as $role_permission)
                                                {{-- <span>{{ $role_permission->name }}</span> --}}
                                                <form
                                                    action="{{ route('role.permission.revoke', [$role->id, $role_permission->id]) }}"
                                                    method="post" onsubmit="return confirm('Are You Sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger m-2"
                                                        type="submit">{{ $role_permission->name }}</button>
                                                </form>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <section>
                                    <h2 class="d-none">Permission Information</h2>
                                    <form action="{{ route('role.permission', $role->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="control-group form-group">
                                            {{-- <label for="permission" class="form-label">Permission</label> --}}
                                            <div class="input-group mb-3">
                                                <select class="form-select" name="permission" autocomplete="permission-name"
                                                    id="permission">
                                                    <option selected>Choose...</option>
                                                    @foreach ($permission as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('name')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="d-flex my-xl-auto right-content align-items-center">
                                                <div class="pe-1 mb-xl-0">
                                                    <button class="btn btn-primary">Assign</button>
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
