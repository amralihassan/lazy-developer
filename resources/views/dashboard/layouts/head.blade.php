<!-- Title -->
<title>@yield('title')</title>
<!--Favicon -->
<link rel="icon" href="{{ URL::asset('assets-dashboard/images/brand/favicon.ico') }}" type="image/x-icon" />

<!-- Bootstrap css -->
<link href="{{ URL::asset('assets-dashboard/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />

<!-- Style css -->
<link href="{{ URL::asset('assets-dashboard/css/style.css') }}" rel="stylesheet" />

<!-- Dark css -->
<link href="{{ URL::asset('assets-dashboard/css/dark.css') }}" rel="stylesheet" />

<!-- Skins css -->
<link href="{{ URL::asset('assets-dashboard/css/skins.css') }}" rel="stylesheet" />

<!-- Animate css -->
<link href="{{ URL::asset('assets-dashboard/css/animated.css') }}" rel="stylesheet" />

<!--Sidemenu css -->
<link id="theme" href="{{ URL::asset('assets-dashboard/css/sidemenu.css') }}" rel="stylesheet">

<!-- P-scroll bar css-->
<link href="{{ URL::asset('assets-dashboard/plugins/p-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />

<!---Icons css-->
<link href="{{ URL::asset('assets-dashboard/plugins/web-fonts/icons.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets-dashboard/plugins/web-fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets-dashboard/plugins/web-fonts/plugin.css') }}" rel="stylesheet" />

<!-- Select2 css -->
<link href="{{ URL::asset('assets-dashboard/plugins/select2/select2.min.css') }}" rel="stylesheet" />

<!-- File Uploads css-->
<link href="{{ URL::asset('assets-dashboard/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

<!-- Time picker css -->
<link href="{{ URL::asset('assets-dashboard/plugins/time-picker/jquery.timepicker.css') }}" rel="stylesheet" />

<!-- Date Picker css -->
<link href="{{ URL::asset('assets-dashboard/plugins/date-picker/date-picker.css') }}" rel="stylesheet" />

<!---jvectormap css-->
<link href="{{ URL::asset('assets-dashboard/plugins/jvectormap/jqvmap.css') }}" rel="stylesheet" />

<!-- Data table css -->
<link href="{{ URL::asset('assets-dashboard/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />

<!--Daterangepicker css-->
<link href="{{ URL::asset('assets-dashboard/plugins/bootstrap-daterangepicker/daterangepicker.css') }}"
    rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- custom Style css -->
<link href="{{ URL::asset('assets-dashboard/css/custom-style.css') }}" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/vendors.min.css') }}">


@yield('style')
