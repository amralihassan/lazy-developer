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
                                                <h1 class="mb-2">{{ __('Verify Email') }}</h1>
                                                <p class="text-muted">{{ __('Verify Email Page') }}</p>
                                                <hr class="my-6">
                                                <form method="POST" action="{{ route('admin.verification.send') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn btn-lg btn-primary btn-block px-4"><i class="fe fe-arrow-right"></i> {{ __('Resend Verification Email') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn btn-lg btn-primary btn-block px-4"><i class="fe fe-arrow-right"></i> {{ __('Log Out') }}</button>
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

