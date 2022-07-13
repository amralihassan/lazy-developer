<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta name="Description" content="">
		<meta name="Author" content="">
		<meta name="Keywords" content=""/>
		@include('dashboard.layouts.head')
	</head>

	<body class="h-100vh page-style1 light-mode default-sidebar">
		<!-- /Loader -->
		@yield('content')
		@include('dashboard.layouts.footer-scripts')
	</body>
</html>
