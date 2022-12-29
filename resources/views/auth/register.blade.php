@extends('layouts.app')

@section('content')
<div class="bg-theme">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-md-5 mx-auto loginDe bg-white">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <a href="/"><img src="{{ asset('img/logo.png') }}" alt="" style="width: 100px;"></a>
                        <!-- <h5 class="font-weight-bold mt-3">Welcome Back</h5> -->
                        <h4 class="font-weight-bold mt-3">Make the most of your <br> student life</h4>
                    </div>
                    <form method="POST" action="{{ route('register') }}" onsubmit="clickSubmit()">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1">{{ __('Name') }}</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-user position-absolute"></i>
                                <input id="name" placeholder="Enter your full name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">{{ __('Email') }}</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-at-sign position-absolute"></i>
                                <input id="email" placeholder="Enter your email address." type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">{{ __('Password') }}</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-unlock position-absolute"></i>
                                <input id="password" placeholder="Enter password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mb-1">{{ __('Confirm Password') }}</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-unlock position-absolute"></i>
                                <input id="password-confirm" placeholder="Reenter your password" type="password" class="form-control " name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="new-password" autofocus>


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">You agree to the Osahanin <a href="#">User Agreement</a>, <a href="#">Privacy Policy</a>, and <a href="#">Cookie Policy</a>.</label>
                        </div>
                        <button class="btn btn-primary btn-block text-uppercase "  type="submit"> Agree & Join </button>

                        <div class="py-3 d-flex align-item-center">
                            <a href="/forgot-password">Forgot password?</a>
                            <span class="ml-auto"> Already on Student Book? <a class="font-weight-bold" href="{{ route('login') }}">Sign in</a></span>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
