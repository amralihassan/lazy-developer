@extends('bakerysoft::bakerysoft-dashboard')
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

            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'into')" id="defaultOpen">Introduction</button>
                <button class="tablinks" onclick="openCity(event, 'ui')">Laravel UI</button>
                <button class="tablinks" onclick="openCity(event, 'yajra')">jQuery DataTables API for Laravel</button>
                <button class="tablinks" onclick="openCity(event, 'realrashid')">SweetAlert</button>
                <button class="tablinks" onclick="openCity(event, 'laratrust')">Laratrust</button>
                <button class="tablinks" onclick="openCity(event, 'image')">Intervention Image</button>
                <button class="tablinks" onclick="openCity(event, 'excel')">Maatwebsite Excel</button>
            </div>
            <div id="into" class="tabcontent">
                <h4>Introduction</h4>
                <p>
                    Hi, welcome to the official documentation for Bakerysoft 6 - this is a toolkit for building
                    administration interfaces. It's an administration area minimalistic template. A starting point for
                    developing back-office systems, intranets or a CMS systems.
                </p>
                <p>You could call it CMS, but it's a very slim one, with as little content to manage as possible. It has:
                </p>
                <ul>
                    <li>UI - nice admin template based on Dashtic (<a
                            href="https://preview.themeforest.net/item/dashtic-html-admin-template/full_screen_preview/27368151"
                            target="_blank" rel="nofollow">visit dashtic</a>)</li>
                    <li>CRUD generator</li>
                    <li>Authorization, My profile &amp; Users CRUD</li>
                    <li>Translations manager</li>
                    <li>other helpers to quickly bootstrap your new administration area (Media Library, Admin Listing, etc.)
                    </li>
                </ul>

            </div>

            <div id="ui" class="tabcontent">
                <form action="{{ route('install-ui') }}" method="post">
                    @csrf
                    <h4>Laravel/ui</h4>
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
            </div>

            <div id="yajra" class="tabcontent">
                <form action="{{ route('install-yajra') }}" method="post">
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
                                {{ $yajra['installed'] ? 'disabled' : '' }} type="submit"
                                id="button-addon2">{{ $yajra['installed'] ? 'Installed' : 'Install' }}</button>
                        </div>
                    </div>
                    <p>Register provider and facade on your config/app.php file.</p>
                    <div style="border: 1px solid #d4d4d4;padding: 5px;background-color: #e9ecef;margin-bottom:10px">
                        <pre><span class="pl-s">'providers'</span> =&gt; [
                            ...,
                            <span class="pl-v">Yajra</span>\<span class="pl-v">DataTables</span>\<span class="pl-v">DataTablesServiceProvider</span>::class,
                        ]

                        <span class="pl-s">'aliases'</span> =&gt; [
                            ...,
                            <span class="pl-s">'DataTables'</span> =&gt; <span class="pl-v">Yajra</span>\<span class="pl-v">DataTables</span>\<span class="pl-v">Facades</span>\<span class="pl-v">DataTables</span>::class,
                        ]</pre>
                    </div>
                </form>
            </div>

            <div id="realrashid" class="tabcontent">
                <form action="{{ route('install-realrashid') }}" method="post">
                    @csrf
                    <h4>SweetAlert</h4>
                    <p>
                        A Beautiful, Responsive, Customizable, Accessible (Wai-aria) Replacement For Javascript's Popup
                        Boxes
                        For Laravel
                    </p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $realrashid['package'] }}" readonly
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn {{ $realrashid['installed'] ? 'btn-success' : 'btn-outline-success' }}"
                                {{ $realrashid['installed'] ? 'disabled' : '' }} type="submit"
                                id="button-addon2">{{ $realrashid['installed'] ? 'Installed' : 'Install' }}</button>
                        </div>
                    </div>
                </form>
            </div>

            <div id="laratrust" class="tabcontent">
                <form action="{{ route('install-laratrust') }}" method="post">
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

            </div>

            <div id="image" class="tabcontent">
                <form action="{{ route('install-image') }}" method="post">
                    @csrf
                    <h4>Intervention Image</h4>
                    <p>
                        Intervention Image is an open source PHP image handling and manipulation library. It provides an
                        easier
                        and expressive way to create, edit, and compose images and supports currently the two most common
                        image
                        processing libraries GD Library and Imagick.
                    </p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $image['package'] }}" readonly
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn {{ $image['installed'] ? 'btn-success' : 'btn-outline-success' }}"
                                {{ $image['installed'] ? 'disabled' : '' }} type="submit"
                                id="button-addon2">{{ $image['installed'] ? 'Installed' : 'Install' }}</button>
                        </div>
                    </div>
                </form>

            </div>

            <div id="excel" class="tabcontent">
                <form action="{{ route('install-excel') }}" method="post">
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
                                {{ $excel['installed'] ? 'disabled' : '' }} type="submit"
                                id="button-addon2">{{ $excel['installed'] ? 'Installed' : 'Install' }}</button>
                        </div>
                    </div>
                </form>
            </div>



            {{-- <h2>After Installation</h2>
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
            ]</pre> --}}

        </main>
    </div>
@endsection
@section('script')
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
@endsection
