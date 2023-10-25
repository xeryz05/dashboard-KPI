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
            <form
                method="POST"
                action="{{ route('password.store') }}"
            >
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
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
                        value="{{ old('email', $request->email) }}"
                    >
                    {{-- <div class="valid-feedback" messages="$errors->get('password')"> --}}
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" name="password" class="form-control">
                </div>
                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
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

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
