<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Astros</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/sculptor.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/welcome.css')}}">
</head>
<body>
<div class="screenHeight aligner flexRow">
    <header class="container textCenter textWhite column s12 m12 l12">
        <h1>Astros</h1>
        <p>@lang('astros.shortdescription')</p>
        <button class="button blur"><a href="{{ route('login') }}">Login</a></button>
    </header>
</div>
<div class="grid">
    <div class="column s12 m12 l12 textCenter">
        <p class="textWhite">@lang('astros.distributed')
            <a href="https://github.com/codespinsolutions/Astros/blob/master/LICENSE">AGLP 3.0</a>
        </p>
    </div>
</div>
</body>
</html>
