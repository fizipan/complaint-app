@extends('layouts.auth')

@section('title', 'Register')

@section('content')
     <!-- Upload Form Section -->
    <div class="container space-2">
      <div class="w-lg-75 mx-lg-auto">
        <!-- Title -->
        <div class="text-center mb-9">
            <div class="mb-3">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('back-design/clients/img/logo-light.png') }}" style="max-width: 60px !important;" alt="Logo">
                </a>
            </div>
            <h1 class="h2">Welcome to Report Online</h1>
            <p class="mb-0">Fill out the form to get started.</p>
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

        <form action="{{ route('register') }}" method="POST" class="js-validate">

          @csrf

          <!-- Listing Agent Information -->
          <div class="mb-5">

            <div class="row">
              <div class="col-md-6 mb-3">
                <!-- Input -->
                <div class="js-form-message  form-group">
                    <label class="input-label" for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Full Name" aria-label="Name" autofocus autocomplete="off" required>
                </div>
                <!-- End Input -->
              </div>

              <div class="col-md-6 mb-3">
                 <!-- Input -->
                <div class="js-form-message  form-group">
                    <label class="input-label" for="number_id">{{ __('Number ID') }}</label>
                    <input type="text" class="form-control js-masked-input" name="number_id" value="{{ old('number_id') }}" minlength="16" id="number_id" placeholder="xxxxxxxxxxxxxxxx" aria-label="Number Id" autocomplete="off"
                         data-hs-mask-options='{
                          "template": "0000000000000000"
                        }'>
                </div>
                <!-- End Input -->
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="js-form-message form-group">
                    <label class="input-label" for="email">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="people@mail.com" aria-label="Email address" autocomplete="off" required>
                </div>
                <!-- End Input -->
              </div>

              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="js-form-message form-group">
                    <label class="input-label" for="mobile_phone">{{ __('Mobile Phone') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control js-masked-input" name="mobile_phone" value="{{ old('mobile_phone') }}" id="mobile_phone" placeholder="+62 xxx xxxx xxxx" aria-label="Mobile Phone" autocomplete="off" required 
                              data-hs-mask-options='{
                                "template": "+62 000 0000 0000"
                              }'>
                </div>
                <!-- End Input -->
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="js-form-message form-group">
                    <label class="input-label" for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="********" aria-label="********" required minlength="8" autocomplete="new-password">
                </div>
                <!-- End Input -->
              </div>

              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="js-form-message form-group">
                    <label class="input-label" for="password_confirmation">Confirm password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="********" aria-label="********" minlength="8" required autocomplete="new-password">
                </div>
                <!-- End Input -->
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="js-form-message form-group">
                    <label for="date_of_birth" class="input-label">Date of Birth <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Select the date of birth" value="{{ old('date_of_birth') }}" autocomplete="off" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-inputmask-placeholder="dd/mm/yyyy" required>

                </div>
                <!-- End Input -->
              </div>

              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="js-form-message form-group">
                    <!-- Select -->
                    <label for="gender" class="input-label">Gender <span class="text-danger">*</span></label>
                    <select class="js-custom-select custom-select" id="gender" name="gender" size="1" style="opacity: 0;"
                            data-hs-select2-options='{
                            "placeholder": "Select Gender"
                            }' required>

                        <option label="empty"></option>
                        <option value="{{ 1 }}" {{ old('gender') == 1 ? 'selected' : '' }}>Male</option>
                        <option value="{{ 2 }}" {{ old('gender') == 2 ? 'selected' : '' }}>Female</option>
                    
                    </select>
                    <!-- End Select -->
                </div>
                <!-- End Input -->
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 mb-3">
                <!-- Input -->
                <div class="js-form-message form-group">
                    <label for="address" class="input-label">Adresss <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="6" style="resize: none" name="address" id="address" minlength="10" placeholder="Please enter your address." required>{{ old('address') }}</textarea>

                </div>
                <!-- End Input -->
              </div>
            </div>
          </div>
          <!-- End Listing Agent Information -->

          <div class="mb-3">
              <span class="font-size-1 text-muted">Already have an account? </span>
              <a class="font-size-1 font-weight-bold" href="{{ route('login') }}">Login</a>
          </div>

          <button type="submit" class="btn btn-primary btn-block transition-3d-hover">Sign Up</button>
          <a href="{{ route('home') }}" class="btn btn-ghost-secondary btn-block">Back to home</a>
        </form>
      </div>
    </div>
@endsection

{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
