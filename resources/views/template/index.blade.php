@extends('dashboard.layouts.master')
@section('title', $data['page_title'])
@section('style')
    <!-- File Uploads css -->
    <link href="{{ asset('assets-dashboard/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-dashboard/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-dashboard/css/data-list-view.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .apply-btn {
            padding-right: 60px;
            padding-left: 60px;
        }

        .data-list-view-header .add-new-data-sidebar .add-new-data,
        .data-thumb-view-header .add-new-data-sidebar .add-new-data {
            height: 107vh !important;
        }
    </style>
@endsection

@section('page-header')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title">{{ $data['page_title'] }}</h4>
        </div>
    </div>
@endsection

@section('content')
    {{-- search_box_path --}}
    @if(isset($data['search_box_path']) && !empty($data['search_box_path']))
        @include($data['search_box_path'])
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ $data['page_title'] }}</div>
                </div>
                <div class="card-body">

                    @isset($data['sort_path'])
                        <a href="#" onclick="openSortWindow()" class="btn btn-primary shadow mb-1">@lang('app.LOCAL_sort_by')</a>
                    @endisset
                    @isset($data['filter_path'])
                            @php
                                $id = isset($data['id']) ? $data['id'] : null;
                            @endphp
                            <a href="#" onclick="openFilterWindow()" class="btn btn-primary shadow  mb-1"><i
                                    class="fa fa-filter"></i> @lang('app.LOCAL_filter')
                            </a>
                    @endisset
                    <div class="pull-right">


                            @php
                                $id = isset($data['id']) ? $data['id'] : null;
                            @endphp
                            <a href="{{ route($data['route_create'], $id) }}"
                                class="btn btn-primary shadow  mb-1">{{ $data['create_button_name'] }}
                            </a>


                        @isset($data['route_back'])
                            <a href="{{ route($data['route_back'], $data['back_parent_id']) }}" onclick="importData()"
                                class="btn btn-light shadow mb-1">{{ $data['back_button_name'] }}
                            </a>
                        @endisset

                        @isset($data['import_button_name'])

                                <a href="#" onclick="importData()"
                                    class="btn btn-primary shadow mb-1">{{ $data['import_button_name'] }}
                                </a>
                        @endisset

                            @isset($data['route_export'])
                                <a href="{{ route($data['route_export']) }}"
                                    class="btn btn-primary shadow mb-1">{{ $data['export_button_name'] }}
                                </a>
                            @endisset

                            <a href="#" onclick="multipleDelete();"
                                class="btn btn-danger shadow mb-1">{{ $data['delete_button_name'] }}
                            </a>
                    </div>
                    <br>
                    <br>
                    <form id='formData' method="post">
                        <div
                            class="{{ isset($data['table_responsive']) && $data['table_responsive'] ? 'table-responsive' : '' }}">
                            <table id="list-datatable" class="table dynamic-table table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        {!! $data['columns_names'] !!}
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @if (isset($data['route_import']) && isset($data['import_button_name']) && !empty($data['route_import']))
        {{-- import --}}
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">@lang('app.LOCAL_import')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route($data['route_import']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-12">
                                <input type="file" name="file" class="dropify" data-height="180" />
                            </div>
                            <br>
                            <button class="btn btn-success">{{ $data['import_button_name'] }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- sort --}}
    @isset($data['sort_path'])
        @include($data['sort_path'])
    @endisset

    {{-- filter --}}
    @isset($data['filter_path'])
        @include($data['filter_path'])
    @endisset
@endsection

@section('scripts')
    {{-- columns - route --}}
    @include('vendor.bakerysoft.template.script', [
        'id' => isset($data['id']) ? $data['id'] : null,
        'route' => $data['route_index'],
        'columns' => $data['columns'],
        'script_path' => $data['script_path'],
    ])

    <script>
        function importData() {
            $('#importModal').modal('show');
        }
    </script>
    {{-- upload --}}
    <script src="{{ asset('assets-dashboard/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/filupload.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/data-list-view.js') }}"></script>
@endsection
