<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>


        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

         <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.min.css')}}">

         <link href="{{asset('admin/css/style.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('admin/css/metisMenu.min.css')}}" rel="stylesheet">


        <!-- Morris Charts CSS -->
        <link href="{{asset('admin/css/morris.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('admin/css/sb-admin-2.css')}}" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="{{asset('admin/css/dataTables.bootstrap.css')}}" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="{{asset('admin/css/dataTables.responsive.css')}}" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

         @yield('stylesheet')



</head>
<body>
   <div id="wrapper">
            @include('partials.adminheader')
            @include('partials.message')
            @yield('content')
   </div>

        <!-- jQuery -->
    <script src="{{asset('admin/js/jquery-3.1.1.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('admin/js/metisMenu.min.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.responsive.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('admin/js/raphael.min.js')}}"></script>
    <script src="{{asset('admin/js/morris.min.js')}}"></script>
    <script src="{{asset('admin/js/morris-data.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('admin/js/sb-admin-2.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


    <script type="text/javascript">

        $(document).ready(function(){
            var qty=$(".qty");
            var price = $(".price");
            qty.keyup(function(){
                var total=isNaN(parseInt(qty.val()* price.val())) ? 0 :(qty.val()* price.val())
                $(".amount").val(total);
            });
        })
    </script>


    <script type="text/javascript">
        
    $(document).ready(function () {
        $('.add').click(function () {
            var tr = '<tr>' +
                '<td><input type="text" class="name form-control" name="name" value="" placeholder="Enter to add new category"></td>' +
                '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
            $('.neworderbody').append(tr);
        });
        $('.neworderbody').delegate('.delete', 'click', function () {
            $(this).parent().parent().remove();
            totalAmount();
        });    
    });

    </script>

    

    <script type="text/javascript" >
    $(document).ready(function () {
        $(".select2-multi").select2();
    });
    </script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>

        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });

    </script>
    @yield('scripts')
</body>

</html>