<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<meta name="Description" content="">
		<meta name="Author" content="">
		<meta name="Keywords" content=""/>
		@include('dashboard.layouts.head')
	</head>

    <body class="app sidebar-mini light-mode default-sidebar">
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('assets-dashboard/images/svgs/loader.svg')}}" class="loader" alt="Loader">
		</div>
		<!-- /Loader -->


        <div class="page">
            <div class="page-main">
                @include('dashboard.layouts.main-sidebar')

                <div class="app-content main-content">
                    <div class="side-app">
                        @include('dashboard.layouts.main-header')

                        <!--Page header-->
                        @yield('page-header')
                        <!--End Page header-->

                        @yield('content')
                    </div>
                </div>
            </div>
            @include('dashboard.layouts.footer')
        </div>

        <!-- Back to top -->
        <a href="#top" id="back-to-top">
            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
        </a>
        @include('dashboard.layouts.footer-scripts')
	</body>
</html>
