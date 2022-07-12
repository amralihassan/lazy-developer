@extends('vendor.bakerysoft.bakerysoft-dashboard')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="{{ asset('images/logo.jpg') }}" alt="" width="72"
                    height="57">
                <h2>Install Packages</h2>
                {{-- <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form
                group has a validation state that can be triggered by attempting to submit the form without completing
                it.</p> --}}
            </div>

            <form action="{{ url('bakery-soft/install/laravel/ui') }}" method="post">
                @csrf
                <h4>Laravel/ui</h4>
                <p>
                    Laravel Sanctum provides a featherweight authentication system for SPAs (single page applications),
                    mobile applications, and simple, token based APIs. Sanctum allows each user of your application to
                    generate multiple API tokens for their account. These tokens may be granted abilities / scopes which
                    specify which actions the tokens are allowed to perform.
                </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $ui['package'] }}" readonly
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn {{ $ui['installed'] ? 'btn-success' : 'btn-outline-success' }}"
                            {{ $ui['installed'] ? 'disabled' : '' }} type="submit"
                            id="button-addon2">{{ $ui['installed'] ? 'Installed' : 'Install' }}</button>
                    </div>
                </div>
            </form>

            <form action="{{ url('bakery-soft/install/yajra') }}" method="post">
                @csrf
                <h4>jQuery DataTables API for Laravel</h4>
                <p>
                    Laravel package for handling server-side works of DataTables jQuery Plugin via AJAX option by using
                    Eloquent ORM, Fluent Query Builder or Collection.
                </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $yajra['package'] }}" readonly
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn {{ $yajra['installed'] ? 'btn-success' : 'btn-outline-success' }}"
                            {{ $laratrust['installed'] ? 'disabled' : '' }} type="submit"
                            id="button-addon2">{{ $laratrust['installed'] ? 'Installed' : 'Install' }}</button>
                    </div>
                </div>
            </form>

            <form action="{{ url('bakery-soft/install/laratrust') }}" method="post">
                @csrf
                <h4>Laratrust</h4>
                <p>
                    Laratrust is a Laravel package that lets you handle very easily roles and permissions inside your
                    application. All of this through a very simple configuration process and API.
                </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $laratrust['package'] }}" readonly
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn {{ $laratrust['installed'] ? 'btn-success' : 'btn-outline-success' }}"
                            {{ $laratrust['installed'] ? 'disabled' : '' }} type="submit"
                            id="button-addon2">{{ $laratrust['installed'] ? 'Installed' : 'Install' }}</button>
                    </div>
                </div>
            </form>

            <form action="{{ url('bakery-soft/install/image') }}" method="post">
                @csrf
                <h4>Intervention Image</h4>
                <p>
                    Intervention Image is an open source PHP image handling and manipulation library. It provides an easier
                    and expressive way to create, edit, and compose images and supports currently the two most common image
                    processing libraries GD Library and Imagick.
                </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $image['package'] }}" readonly
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn {{ $image['installed'] ? 'btn-success' : 'btn-outline-success' }}"
                            {{ $laratrust['installed'] ? 'disabled' : '' }} type="submit"
                            id="button-addon2">{{ $laratrust['installed'] ? 'Installed' : 'Install' }}</button>
                    </div>
                </div>
            </form>

            <form action="{{ url('bakery-soft/install/realrashid') }}" method="post">
                @csrf
                <h4>SweetAlert</h4>
                <p>
                    A Beautiful, Responsive, Customizable, Accessible (Wai-aria) Replacement For Javascript's Popup Boxes
                    For Laravel
                </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $realrashid['package'] }}" readonly
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn {{ $realrashid['installed'] ? 'btn-success' : 'btn-outline-success' }}"
                            {{ $laratrust['installed'] ? 'disabled' : '' }} type="submit"
                            id="button-addon2">{{ $laratrust['installed'] ? 'Installed' : 'Install' }}</button>
                    </div>
                </div>
            </form>

            <form action="{{ url('bakery-soft/install/excel') }}" method="post">
                @csrf
                <h4>Laravel Excel</h4>
                <p>
                    Laravel Excel is intended at being Laravel-flavoured PhpSpreadsheet: a simple, but elegant wrapper
                    around PhpSpreadsheet with the goal of simplifying exports and imports.
                </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $excel['package'] }}" readonly
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn {{ $excel['installed'] ? 'btn-success' : 'btn-outline-success' }}"
                            {{ $laratrust['installed'] ? 'disabled' : '' }} type="submit"
                            id="button-addon2">{{ $laratrust['installed'] ? 'Installed' : 'Install' }}</button>
                    </div>
                </div>
            </form>
            <hr>

            <h2>After Installation</h2>
            <pre><span class="pl-s">'providers'</span> =&gt; [
                ...,
                <span class="pl-v">Yajra</span>\<span class="pl-v">DataTables</span>\<span class="pl-v">DataTablesServiceProvider</span>::class,
                <span class="pl-v">RealRashid</span>\<span class="pl-v">SweetAlert</span>\<span class="pl-v">SweetAlertServiceProvider</span>::class,
                <span class="pl-v">Intervention</span>\<span class="pl-v">Image</span>\<span class="pl-v">ImageServiceProvider</span>::class,
            ]

            <span class="pl-s">'aliases'</span> =&gt; [
                ...,
                <span class="pl-s">'DataTables'</span> =&gt; <span class="pl-v">Yajra</span>\<span class="pl-v">DataTables</span>\<span class="pl-v">Facades</span>\<span class="pl-v">DataTables</span>::class,
                <span class="pl-s">'Alert'</span> =&gt; <span class="pl-v">RealRashid</span>\<span class="pl-v">SweetAlert</span>\<span class="pl-v">Facades</span>\<span class="pl-v">Alert</span>::class,
                <span class="pl-s">'Image'</span> =&gt; <span class="pl-v">Intervention</span>\<span class="pl-v">Image</span>\<span class="pl-v">Facades</span>\<span class="pl-v">Image</span>::class,
            ]</pre>

        </main>
    </div>
@endsection
