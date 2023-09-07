@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <!-- container -->
    <div class="main-container container-fluid">
        <section class="m-4">
            <div class="card">
                <div class="card-body">
                    <header>
                        <div>
                            <h2 class="text-lg font-medium text-gray-900">
                                Profile Information
                            </h2>
                        </div>

                        <p class="mt-1 text-sm text-gray-600">
                            Update your account's profile information and email address.
                        </p>
                    </header>
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>
                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Name')" class="form-label"/>
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Email')" class="form-label"/>
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full form-control" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-gray-800">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center gap-4">
                            <button class="btn btn-primary btn-sm">
                                {{ __('Save') }}
                            </button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="m-4">
            <div class="card">
                <div class="card-body">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Update Password') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </p>
            </header>
            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')

                <div class="mb-3">
                    <x-input-label for="password" :value="__('Current Password')"/>
                    <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full form-control" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <x-input-label for="password" :value="__('New Password')"/>
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <button class="btn btn-primary btn-sm">
                        {{ __('Save') }}
                    </button>

                    @if (session('status') === 'password-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </section>
        <section class="m-4">
            <div class="card">
                <div class="card-body">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Delete Account') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                        </p>
                    </header>


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Delete Account
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xlg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="fs-5 fw-bold">
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h2>

                                <p class="mt-1">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                </p>

                                <div class="mt-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" name="password" type="password" class="form-control">

                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />

                                    {{-- @if ($errors->userDeletion->has('password'))
                                        <div class="alert alert-danger">
                                            {{ $errors->userDeletion->first('password') }}
                                        </div>
                                    @endif --}}
                                </div>

                                <div class="mt-2 flex justify-end">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-danger btn-sm" style="background-color: red">
                                        {{ __('Delete Account') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="main-content app-content">
    <!-- container -->
    <div class="main-container container-fluid">
        
    </div>
</div>

@endsection
