@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-md-5 mx-auto loginDe" >
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <a href="index.html"><img src="{{ asset('img/logo.png') }}" alt="" style="width: 100px;"></a>
                        <h5 class="font-weight-bold mt-3">Forgot password?</h5>
                        <p class="text-muted">Reset password in two quick steps</p>
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1">{{ __('Email') }}</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-user position-absolute"></i>
                                <input id="email" placeholder="Enter your email address." type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                               
                            </div>
                        </div>
                        

                        <div class="row mb-0">
                            <div class="col-md-6 margin-auto" style="margin:auto">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
