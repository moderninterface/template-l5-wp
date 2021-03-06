<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="apple-touch-icon" sizes="57x57" href="/img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/img/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/img/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/img/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/img/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/img/favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/img/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/img/favicons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/img/favicons/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/img/favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/img/favicons/manifest.json">
	<link rel="mask-icon" href="/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="apple-mobile-web-app-title" content="Sugar Street">
	<meta name="application-name" content="Sugar Street">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="/img/favicons/mstile-144x144.png">
	<meta name="msapplication-config" content="/img/favicons/browserconfig.xml">

	@yield('meta')

	<meta property="og:title" content="@yield('title') | Project Name Here">
	<meta property="og:url" content="{{ Request::url() }}">

	<title>@yield('title') | Project Name Here</title>

	<link href="/css/app.css?v=1.0" rel="stylesheet">
	@yield('css')
</head>
<body>
	@include('header')
	@yield('content')
	@include('footer')
	<script src="/js/app.js?v=1.0"></script>
	@yield('js')
</body>
</html>
