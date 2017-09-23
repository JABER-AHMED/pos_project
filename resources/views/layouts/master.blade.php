<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="{{asset('src/css/font-awesome.min.css')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

         <link rel="stylesheet" type="text/css" href="{{ asset('src/css/bootstrap.min.css')}}">
         <link href="{{asset('src/css/style.min.css')}}" rel="stylesheet">

    </head>
    <body>
        @include('partials.message')
        @yield('content')
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"
    integrity="sha256-Xxq2X+KtazgaGuA2cWR1v3jJsuMJUozyIXDB3e793L8="
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    integrity="sha256-HmfY28yh9v2U4HfIXC+0D6HCdWyZI42qjaiCFEJgpo0="
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('src/js/bootstrap.min.js')}}"></script>
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    </body>

</html>