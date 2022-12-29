@extends('layouts.app')

@section('content')
<div class="bg-theme">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-md-5 mx-auto loginDe bg-white" >
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <a href="/"><img src="{{ asset('img/logo.png') }}" alt="" style="width: 100px;"></a>
                        <h5 class="font-weight-bold mt-3">Reset password</h5>
                        <p class="text-muted">Reset password in two quick steps</p>
                    </div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label class="mb-1">{{ __('Email') }}</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-user position-absolute"></i>
                                <input id="email" placeholder="Enter your email address." type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $_GET['email'] ?? old('email') }}" required autocomplete="email" autofocus>

                               
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mb-1">{{ __('Password') }}</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-unlock position-absolute"></i>
                                <input id="password" placeholder="Enter your password." type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                               
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mb-1">{{ __('Confirm Password') }}</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-unlock position-absolute"></i>
                                <input id="password-confirm" type="password" placeholder="Enter your confirm password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           
                               
                            </div>
                        </div>
                       


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


