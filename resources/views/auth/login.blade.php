@extends('layouts.app')

@section('content')
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
                            <img src="assets/images/COUNTRY DEALERS LOGO AZ.svg" alt="logo">
                        </div>
                        <h4>Welcome back!</h4>
                        <h6 class="font-weight-light">Happy to see you again!</h6>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fa fa-user text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control form-control-lg border-left-0"
                                        id="exampleInputEmail" placeholder="Email" name="email"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fa fa-lock text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg border-left-0"
                                        id="exampleInputPassword" placeholder="Password" name="password" required>
                                    @error('password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    {{-- <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input">
                                    Keep me signed in
                                </label> --}}
                                </div>
                                {{-- <a href="javascript:;" class="auth-link text-black">Forgot password?</a> --}}
                            </div>
                            <div class="my-3">
                                <button class="btn btn-block btn-primary btn-lg auth-form-btn">LOGIN</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="{{route('register')}}" class="text-primary">Create</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy;
                        {{ date('Y') }} All
                        rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
@endsection
