@extends('layouts.auth')

{{-- set title --}}
@section('title', 'Login')

@section('content')
<div class="container pt-lg-4">
  <div class="row no-gutters">
    <div class="col-md-8 col-lg-7 col-xl-6 offset-md-2 offset-lg-2 offset-xl-3 space-2">
    
        <div class="mb-3">
            <a href="{{ route('home') }}">
                <img src="{{ asset('back-design/clients/img/logo-light.png') }}" style="max-width: 60px !important;" alt="Logo">
            </a>
        </div>

        <!-- Form -->
        <form class="js-validate" method="POST" action="{{ route('login') }}">

            @csrf

            <!-- Title -->
            <div class="mb-5 mb-md-7">
                <h1 class="h2">Welcome back</h1>
                <p>Login to manage your account.</p>
            </div>
            <!-- End Title -->

            <!-- Error -->
            @if ($errors->any())
                <div class="alert alert-soft-danger alert-dismissible fade show" style="margin-top: -20px; margin-bottom: 20px" role="alert">
                    <div style="font-weight: 600">{{ __('Whoops! Something went wrong.') }}</div>
                    <ul class="mt-3 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <svg aria-hidden="true" class="mb-0" width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                        </svg>
                    </button>
                </div>
            @endif
            <!-- End Error -->

            <!-- Form Group -->
            <div class="js-form-message form-group">
                <label class="input-label" for="email">{{ __('Email Address') }}</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="people@mail.com" aria-label="Email address" autofocus autocomplete="off" required
                        data-msg="Please enter a valid email address.">
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div class="js-form-message form-group">
                <label class="input-label" for="password">{{ __('Password') }}</label>
                <input type="password" class="form-control" name="password" id="password" minlength="8" placeholder="********" aria-label="********" autocomplete="current-password" required>
            </div>
            <!-- End Form Group -->

            <!-- Button -->
            <div class="row align-items-center mb-5">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <span class="font-size-1 text-muted">Do not have an account? </span>
                    <a class="font-size-1 font-weight-bold" href="{{ route('register') }}">Register</a>
                </div>

                <div class="col-sm-6 text-sm-right mt-2">
                    <button type="submit" style="width: 120px" class="btn btn-primary transition-3d-hover">Sign In</button>
                </div>
            </div>
            <!-- End Button -->
        </form>
        <!-- End Form -->
    </div>
  </div>
</div>
@endsection


{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
