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

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

         <link rel="stylesheet" type="text/css" href="{{ asset('src/css/bootstrap.min.css')}}">

         <link href="{{asset('src/css/style.min.css')}}" rel="stylesheet">

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
    <script type="text/javascript" src="{{asset('src/js/bootstrap.min.js')}}"></script>
     
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
     <!-- DataTables JavaScript -->
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.responsive.js')}}"></script>

    <script type="text/javascript" >
        $(document).ready(function () {
            $(".select2-multi").select2({

                maximumSelectionLength: 1
            });
        });
    </script>


    <script type="text/javascript">
    function totalAmount(){
        var t = 0;
        $('.amount').each(function(i,e){
            var amt = $(this).val()-0;
            t += amt;
        });
    }
    $(function () {
        $('.product-search').delegate('.product_id', 'change', function () {
            var tr = $(this).parent().parent();
            var price = tr.find('.product_id option:selected').attr('data-price');
            tr.find('.price').val(price);
            
            var qty = tr.find('.qty').val() - 0;
            var price = tr.find('.price').val() - 0;
        
            var total = (qty * price);
            tr.find('.amount').val(total);
            totalAmount();
        });
        $('.product-search').delegate('.qty', 'keyup', function () {
            var tr = $(this).parent().parent();
            var qty = tr.find('.qty').val() - 0;
            var price = tr.find('.price').val() - 0;
        
            var total = (qty * price);
            tr.find('.amount').val(total);
            totalAmount();
        });
    });
</script>
<script type="text/javascript">
    
    function totalAmount(){
        var t = 0;
        $('.amount').each(function(i,e){
            var amt = $(this).val()-0;
            t += amt;
        });
         $('.sub-total1').html(t);
    }
    //$('.total').html(t);
    $(document).ready(function () {
        $('.getmoney').change(function(){
            var total = parseInt($('.total').html());
            var getmoney = $(this).val();
            var t = getmoney - total;
            $('.backmoney').val(t);
        });

        //table add js 
            $("#btn-add-form").click(function(){ 
            var name = $(".name_form option:selected").text();
            var quantity = $(".quantity_form").val(); 
            var price = $(".price_form").val(); 
            var total = $(".total_form").val();
            //var delete = $("#btn-delete-form");
            // var markup = "<tr><td>" + name + "</td><td>" + quantity + "</td><td>" + price + "</td><td>" + total + "</td><td>" + delete + "</td></tr>";
            var markup = '<tr><td>' + name + '</td>' +
            '<td>' + quantity + '</td>' + 
            '<td>' + price + '</td>' +
            '<td>' + total + '</td>' +
            '<td>' + delete + '</td></tr>';
            $(".entry_list").append(markup);
            }); 
             
            // Find and remove selected table rows 
            $("#btn-delete-form").click(function(){ 
                $(this).parents("tr").remove();
            }); 
    });


</script>
<!-- <script>

        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });

</script> -->

    <script>
        $(document).ready(function () {
            $('#dataTables').dataTable({
                "scrollY": "300px",
                "scrollCollapse": true,
                "paging": false,
                "ordering": false
            });
        });
    </script>
 
  </body>

</html>