<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<!-- <base href="/"> -->

    <title>@yield('title')</title>
	<meta name="description" content="@yield('description')">

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

</body>

</html>