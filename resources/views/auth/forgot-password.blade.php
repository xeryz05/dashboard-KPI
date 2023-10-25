@extends('layouts.guest')
@section('content')
    <div
        class="card bg-body-tertiary mb-5 rounded p-3 shadow"
        data-aos="zoom-in-up"
        style="width: 25rem;"
    >
        <div class="card-body">
            <h5 class="card-title">
                <img
                    class="img-fluid position-relative start-50 translate-middle top-0 mt-3"
                    src="{{ asset('assets/img/logo/verdanco-removebg-preview.png') }}"
                    style="width: 150px;"
                >
            </h5>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-4 text-sm text-gray-600">
                    <span>Forgot your password? No problem. Just let us know your email address and we will email you a
                        password reset link that will allow you to choose a new one.</span>
                </div>
                <x-auth-session-status
                    class="mb-4"
                    :status="session('status')"
                />
                <div class="mb-3">
                    <label
                        class="form-label"
                        for="email"
                    >Email address</label>
                    <input
                        class="form-control"
                        id="email"
                        type="email"
                        name="email"
                    >
                </div>
                <div class="mt-4 flex items-center justify-end">
                    <button
                        class="btn btn-outline-secondary"
                        type="submit"
                    >Email Password Reset Link</button>
                </div>
            </form>
        </div>
    </div>
@endsection
