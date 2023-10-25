@extends('layouts.guest')
@section('content')
    <div
        class="card bg-body-tertiary mb-5 rounded p-3 shadow"
        data-aos="zoom-in-up"
        style="width: 20rem;"
    >
        <div class="card-body">
            <h5 class="card-title">
                <img
                    class="img-fluid position-relative start-50 translate-middle top-0 mt-3"
                    src="{{ asset('assets/img/logo/verdanco-removebg-preview.png') }}"
                    style="width: 150px;"
                >
            </h5>
            <form
                method="POST"
                action="{{ route('login') }}"
            >
                @csrf
                <div class="mb-3">
                    <label
                        class="form-label"
                        for="exampleInputEmail1"
                    >NoReg</label>
                    <input
                        class="form-control"
                        id="noreg"
                        name="noreg"
                        value="old('noreg')"
                        type="number"
                        required
                        autofocus
                        autocomplete="noreg"
                    >
                </div>
                <div class="mb-3">
                    <label
                        class="form-label"
                        for="password"
                    >Password</label>
                    <input
                        class="form-control"
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    >
                </div>
                <div class="form-check mb-3">
                    <input
                        class="form-check-input"
                        id="show_password"
                        type="checkbox"
                        name="show_password"
                    >
                    <label
                        class="form-check-label"
                        for="show_password"
                    >Show Password</label>
                </div>

                <div class="form-check mb-3">
                    <input
                        class="form-check-input"
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                    >
                    <label
                        class="form-check-label"
                        for="remember_me"
                    >Remember me</label>
                </div>
                <button
                    class="btn btn-primary"
                    type="submit"
                >Submit</button>
                @if (Route::has('password.request'))
                    <a
                        class="link-opacity-25-hover"
                        href="{{ route('password.request') }}"
                    >
                        Forgot your password?
                    </a>
                @endif
            </form>
        </div>
    </div>
@endsection
