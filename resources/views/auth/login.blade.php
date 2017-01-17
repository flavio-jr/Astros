@extends('layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ url('css/login.css')}}">
@endsection

@section('content')
<body class="screenHeight aligner">
    <main class="flexRow center">
        <form action="{{ route('login') }}" method="post" class="column l4 m12 s12 loginForm">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="container">
                <input id="email" name="usr_email" type="email" class="formControl" placeholder="@lang('auth.email')" autofocus>
                <input id="password" name="password" type="password" class="formControl" placeholder="@lang('auth.password')" autofocus>
            </div>
            <div class="center container textCenter">
                <button class="button blur" type="submit">@lang('auth.signin')</button>
            </div>
        </form>
        <main class="column l8 m12 s12 center container textWhite textCenter">
            <h1>Astros</h1>
            <p>@lang('astros.description')</p>
        </main>
    </main>
</body>
@endsection
