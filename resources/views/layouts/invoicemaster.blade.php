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

        <!-- DataTables CSS -->
        <link href="{{asset('admin/css/dataTables.bootstrap.css')}}" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="{{asset('admin/css/dataTables.responsive.css')}}" rel="stylesheet">

         <link rel="stylesheet" type="text/css" href="{{ asset('src/css/bootstrap.min.css')}}">

         <link href="{{asset('src/css/style.min.css')}}" rel="stylesheet">

         <link href="{{asset('src/css/invoice.css')}}" rel="stylesheet">

    </head>
    <body>
    @include('partials.header')
    <div class="container-fluid">
    @include('partials.message') 
    @yield('content')
    </div>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    integrity="sha256-HmfY28yh9v2U4HfIXC+0D6HCdWyZI42qjaiCFEJgpo0="
    crossorigin="anonymous"></script>
    <script src="{{asset('src/js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('src/js/bootstrap.min.js')}}"></script>
    <!-- DataTables JavaScript -->
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.responsive.js')}}"></script>
     
     <!-- DataTables JavaScript -->

       <script>

        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });

    </script>

 
  </body>

</html>