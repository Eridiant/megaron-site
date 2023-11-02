<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<!-- <base href="/"> -->

    <title>@yield('title')</title>
	<meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="icon" href="/images/favicon.png">
	<meta property="og:image" content="/images/dist/preview.jpg">

    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
</head>

<body>

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')
    @include('frontend.layouts.menu')

    <script type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
    <!-- for del -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!-- for del -->
</body>

</html>