@extends('dashboard.layouts.master2')
@section('title', $page_title)
@section('content')
    <div class="page">
        <div class="page-single">
            <div class="p-5">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="card-group mb-0">
                                    <div class="card p-4 page-content">
                                        <div class="card-body page-single-content">
                                            <div class="w-100">
                                                <div class="">
                                                    <h1 class="mb-2">{{ __('Login') }}</h1>
                                                    <p class="text-muted">{{ __('Sign In to your account') }}</p>
                                                </div>
                                                <hr class="my-6">
                                                <form method="POST" action="{{ route('admin.login') }}">
                                                    @csrf
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z" opacity=".3"/><circle cx="12" cy="8" opacity=".3" r="2"/><path d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z"/></svg></span>
                                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                                                    </div>
                                                    @error('email')
                                                        <span class="text-danger" role="alert">
                                                            <p>{{ $message }}</p>
                                                        </span>
                                                    @enderror
                                                    <div class="input-group mt-4">
                                                        <span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg></span>
                                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                                    </div>
                                                    @error('password')
                                                        <span class="text-danger" role="alert">
                                                            <p>{{ $message }}</p>
                                                        </span>
                                                    @enderror
                                                    <div class="form-group mt-4">
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="remember"/>
                                                            <span class="custom-control-label">{{ __('Remember me') }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn btn-lg btn-primary btn-block"><i class="fe fe-arrow-right"></i> {{ __('Login') }}</button>
                                                        </div>
                                                        @if (Route::has('admin.password.request'))
                                                            <div class="col-12">
                                                                <a href="{{ route('admin.password.request') }}" class="btn btn-link box-shadow-0 px-0">{{ __('Forgot your password?') }}</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card text-white bg-primary py-5 d-md-down-none page-content mt-0">
                                        <div class="card-body text-center justify-content-center page-single-content">
                                            <img src="{{URL::asset('assets-dashboard/images/pattern/login.png')}}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
