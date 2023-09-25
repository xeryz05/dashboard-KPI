@extends('layouts.admin')
@section('content')
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <h4 class="page-title">Show User</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Department</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Department</li>
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
                                <h3 class="mb-2">User Information</h3>
                                <section>
                                    <h2 class="d-none">User Information</h2>
                                    <div class="flex flex-col p-2 bg-slate-100">
                                        <div>User Name: {{ $user->name }}</div>
                                        <div>User Email: {{ $user->email }}</div>
                                    </div>
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
                                        @if ($user->roles)
                                            @foreach ($user->roles as $user_roles)
                                                {{-- <span>{{ $role_user->name }}</span> --}}
                                                <form
                                                    action="{{ route('user.roles.remove', [$user->id, $user_roles->id]) }}"
                                                    method="post" onsubmit="return confirm('Are You Sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger m-2"
                                                        type="submit">{{ $user_roles->name }}</button>
                                                </form>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <section>
                                    <h2 class="d-none">User Role Information</h2>
                                    <form action="{{ route('user.role', $user->id) }}" method="post"
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
                    <div class="card">
                        <div class="card-body">
                            <p class="mg-b-20"></p>
                            <div id="wizard1">
                                <h3 class="mb-2">Permission</h3>
                                <div class="col-lg-12">
                                    <div class="m-3 d-flex">
                                        @if ($user->permissions)
                                            @foreach ($user->permissions as $user_permission)
                                                {{-- <span>{{ $user_permission->name }}</span> --}}
                                                <form
                                                    action="{{ route('user.permission.revoke', [$user->id, $user_permission->id]) }}"
                                                    method="post" onsubmit="return confirm('Are You Sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger m-2"
                                                        type="submit">{{ $user_permission->name }}</button>
                                                </form>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <section>
                                    <h2 class="d-none">Permission Information</h2>
                                    <form action="{{ route('user.permission', $user->id) }}" method="post"
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
