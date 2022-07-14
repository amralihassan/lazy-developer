@extends('dashboard.layouts.master')
@section('title', $page_title)
@section('style')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.bootstrap3.min.css">
    <style>
        .selectize-input {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 0.9375rem;
            line-height: 1.6;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #d3dfea;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            border-radius: 5px;
            outline: 0;
            color: #424e79;
            opacity: 1;
        }

        .select2 {
            width: 100% !important;
        }
    </style>
@endsection

@section('page-header')
    <div class="page-header mb-0">
        <div class="page-leftheader">
            <h4 class="page-title">{{ $page_title }}</h4>
        </div>
    </div>
@endsection

@section('content')
    @php
    $id = isset($id) ? $id : null;
    @endphp
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row">
                <ol class="breadcrumb1">
                    <li class="breadcrumb-item1"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item1"><a class="te"
                            href="{{ route($route_cancel, $id) }}">{{ $main_title }}</a></li>
                    <li class="breadcrumb-item1 active">{{ $page_title }}</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- summary --}}
    @isset($summary)
        @include($summary)
    @endisset

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" id="frm" action="{{ route($route_store) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="pull-right">
                                    <div class="col-12 d-flex flex-sm-row flex-column pull-left">
                                        <button type="submit" class="btn btn-primary glow mb-1 mr-sm-1">Save
                                        </button>
                                        <a class="btn btn-light mb-1" href='{{ route($route_cancel, $id) }}'>
                                            Cancel
                                        </a>
                                    </div>
                                </div>
                                <br><br><br>
                                {{-- form --}}
                                @include($form_path)
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
    @isset($script_path)
        @include($script_path)
    @endisset
@endsection
