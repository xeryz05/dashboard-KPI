@extends('layouts.app')
@section('content')
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <h4 class="page-title">Edit Permission</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Permission</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Permission Role</li>
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
                                <h3 class="mb-2">Permission Information</h3>
                                <section>
                                    <h2 class="d-none">Permission Information</h2>
                                    <form action="{{ route('permission.update', $permission->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="control-group form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control required"
                                                value="{{ $permission->name }}" name="name" placeholder="Name">
                                            @error('name')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="d-flex my-xl-auto right-content align-items-center">
                                            <div class="pe-1 mb-xl-0">
                                                <button class="btn btn-primary">Update</button>
                                                <a href="{{ route('permission.index') }}" class="btn btn-warning">Back</a>
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
                                <h3 class="mb-2">Role</h3>
                                <div class="col-lg-12">
                                    <div class="m-3 d-flex">
                                        @if ($permission->roles)
                                            @foreach ($permission->roles as $permission_roles)
                                                {{-- <span>{{ $role_permission->name }}</span> --}}
                                                <form
                                                    action="{{ route('permission.roles.remove', [$permission->id, $permission_roles->id]) }}"
                                                    method="post" onsubmit="return confirm('Are You Sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger m-2"
                                                        type="submit">{{ $permission_roles->name }}</button>
                                                </form>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <section>
                                    <h2 class="d-none">Role Information</h2>
                                    <form action="{{ route('role.permission.role', $permission->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="control-group form-group">
                                            <label for="role" class="form-label">Role</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" name="role" autocomplete="role-name"
                                                    id="role">
                                                    <option selected>Choose...</option>
                                                    @foreach ($role as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role')
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
