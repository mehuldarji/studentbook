@extends('layouts.app')
@section('content')
<div class="bg-theme">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-md-5 mx-auto loginDe bg-white" >
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <a href="/"><img src="{{ asset('img/logo.png') }}" alt="" style="width: 100px;"></a>
                        <h5 class="font-weight-bold mt-3">Welcome Back</h5>
                        <p class="text-muted">Stay updated on your student world</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1">Email or Phone</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-user position-absolute"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Password</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-unlock position-absolute"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                              
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <button class="btn btn-primary btn-block text-uppercase" type="submit"> Sign in </button>

                        <div class="py-3 d-flex align-item-center">
                            <a href="/forgot-password">Forgot password?</a>
                            <span class="ml-auto"> New to Student book ? <a class="font-weight-bold" href="{{ route('register') }}">Join now</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection