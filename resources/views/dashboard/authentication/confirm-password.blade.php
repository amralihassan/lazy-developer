@extends('dashboard.layouts.master2')

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
                                                <h1 class="mb-2">{{ __('Confirm Password') }}</h1>
                                                <p class="text-muted">{{ __('Confirm Password Page') }}</p>
                                                <hr class="my-6">
                                                <form method="POST" action="{{ route('admin.password.confirm') }}">
                                                    @csrf
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg></span>
                                                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                                    </div>
                                                    @error('password')
                                                    <span class="text-danger" role="alert">
                                                                <p>{{ $message }}</p>
                                                            </span>
                                                    @enderror
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <button class="btn btn-lg btn-primary btn-block px-4"><i class="fe fe-arrow-right"></i> {{ __('Confirm') }}</button>
                                                        </div>
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
