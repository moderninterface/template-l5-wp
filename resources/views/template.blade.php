<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="/favicon.ico" />

	@yield('meta')
	<meta property="og:title" content="@yield('title') | Project Name Here">
	<meta property="og:url" content="{{ Request::url() }}">

	<title>@yield('title') | Project Name Here</title>

	<link href="/css/app.css" rel="stylesheet">
	@yield('css')

	<script src="/js/modernizr.js"></script>
</head>
<body>
	@include('header')
	@yield('content')
	@include('footer')
	<script src="/js/jquery-2.1.4.min.js"></script>
	<script src="/js/foundation/foundation.js"></script>
	@yield('js')
</body>
</html>
