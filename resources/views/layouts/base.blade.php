<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ url('css/sculptor.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
    <header class="winter">
        <h1 class="navElementLeft">
            <a href="{{ url('home') }}" title="{{ config('app.name') }}">{{ config('app.name') }}</a>
        </h1>
        <input type="checkbox" id="control-nav" hidden>
        <label for="control-nav" class="controlNav"></label>
        <label for="control-nav" class="controlNavClosed"></label>
        <nav class="navElementRight" role="navigation">
            <ul class="listAuto">
                <li><a href="#" title="Element">Element</a></li>
                <li><a href="#" title="Element">Element</a></li>
                <li><a href="#" title="Element">Element</a></li>
                @if(Auth::guest())
                    <li class="authElement"><a href="{{ url('login') }}">Login</a></li>
                @else
                    <li class="authElement"><a href="#" title="User">{{ Auth::user()->usr_name }}</a></li>
                    <li class="authElement"><a href="{{ url('logout') }}" title="Logout">@lang('auth.logout')</a></li>
                @endif
            </ul>
        </nav>
    </header>
    @yield('content')
</body>
</html>