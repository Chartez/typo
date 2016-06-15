<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Typotext</title>
    <link href="{{{ asset('/css/main.css') }}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{{ asset('/css/animate.css') }}}">
    <link rel="stylesheet" href="{{{ asset('/css/chosen.min.css') }}}">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/chosen.jquery.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

</head>
<body>

<div class="container">

    @if (Auth::check())

        @include('partials.navlogged')
    @else

        @include('partials.nav')
    @endif

    <div class="row">
        @yield('content')
    </div>
</div>

<footer class="footer">
    @include('partials.footer')
</footer>

</body>
</html>