<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Backery Soft v1.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* Style the tab */
        .tab {
            float: left;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            width: 30%;
            height: 500px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            display: block;
            background-color: inherit;
            color: black;
            padding: 10px;
            width: 100%;
            border: 0.2px solid #d4d4d4;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
            font-size: 17px;
            background-color: white;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: rgb(232, 111, 111);
            color: #fff;
        }

        /* Create an active/current "tab button" class */
        .tab button.active {
            background-color: rgb(195, 11, 11);
            color: #fff;
        }

        /* Style the tab content */
        .tabcontent {
            float: left;
            padding: 12px;
            border: 1px solid #ccc;
            width: 70%;
            border-left: none;
            height: 500px;
        }
    </style>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('vendor/bakerysoft/css/dashboard.css') }}">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/home">Backery Soft</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                {{-- <a class="nav-link px-3" href="#">Sign out</a> --}}
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a target="blank" class="nav-link active" aria-current="page" href="/admin/dashboard">
                                <span data-feather="home"></span>
                                Preview Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('packages') }}">
                                <span data-feather="file"></span>
                                Install Packages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('load.crud') }}">
                                <span data-feather="file"></span>
                                Generate CRUD
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <main class="offset-md-2 mt-4" style="min-height:630px">
        @yield('content')
    </main>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2022 Backery Soft</p>
    </footer>
    <script>
        var dataType;
        // add row
        var num = 1;
        $("#addRow").click(function() {

            var html = `
            <div id="inputFormRow">
                            <div class="input-group mb-3">
                                <input type="text" required name="field_name[]" class="form-control m-input" placeholder="Field name ex: first_name" autocomplete="off">
                                <select name="datatype[]" required class="form-control m-input">
                                    <option value="">Select DataType</option>
                                    <option value="bigIncrements">bigIncrements</option>
                                    <option value="unsignedBigInteger">unsignedBigInteger</option>
                                    <option value="string">string</option>
                                    <option value="text">text</option>
                                    <option value="enum">enum</option>
                                    <option value="boolean">boolean</option>
                                    <option value="date">date</option>
                                    <option value="time">time</option>
                                    <option value="integer">integer</option>
                                    <option value="tinyInteger">tinyInteger</option>
                                    <option value="smallInteger">smallInteger</option>
                                    <option value="mediumInteger">mediumInteger</option>
                                    <option value="bigInteger">bigInteger</option>
                                    <option value="mediumText">mediumText</option>
                                    <option value="timestamps">timestamps</option>
                                    <option value="longText">longText</option>
                                    <option value="dateTime">dateTime</option>
                                    <option value="char">char</option>
                                    <option value="decimal">decimal</option>
                                    <option value="double">double</option>
                                    <option value="float">float</option>
                                    <option value="increments">increments</option>

                                </select>
                                <select name="nullable[]" class="form-control m-input">
                                    <option value="no">Nullable (no)</option>
                                    <option value="yes">Nullable (yes)</option>
                                </select>
                                <input type="text" name="default_value[]" class="form-control m-input" placeholder="Default value ex:Mohamed" autocomplete="off">

                                <div class="input-group-append">
                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                </div>

                            </div>
                            <div class="form-group enum" style = "display:none">
                                <div class="row">
                                    <div class="col-md-2"><input type="text" name="enum_value${num}[]value1[]" class="form-control">
                                    </div>
                                    <div class="col-md-2"><input type="text" name="enum_value${num}[]value2[]" class="form-control">
                                    </div>
                                    <div class="col-md-2"><input type="text" name="enum_value${num}[]value3[]" class="form-control">
                                    </div>
                                    <div class="col-md-2"><input type="text" name="enum_value${num}[]value4[]" class="form-control">
                                    </div>
                                    <div class="col-md-2"><input type="text" name="enum_value${num}[]value5[]" class="form-control">
                                    </div>
                                    <div class="col-md-2"><input type="text" name="enum_value${num}[]value6[]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">Relation</div>
                                    <div class="col-md-6">Validation</div>
                                </div>
                            </div>
                            <hr>
                        </div>
            `;

            $('#newRow').append(html);
            num = num + 1;

            dataType = document.querySelectorAll('.enum');
        });



        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
    @yield('script')
</body>

</html>
