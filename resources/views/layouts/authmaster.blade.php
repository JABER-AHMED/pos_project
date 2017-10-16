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
        {{--  <link href="{{asset('admin/css/dataTables.bootstrap.css')}}" rel="stylesheet">  --}}

        <!-- DataTables Responsive CSS -->
        <link href="{{asset('admin/css/dataTables.responsive.css')}}" rel="stylesheet">

        {{--  <link href="{{asset('src/css/select2.css')}}" rel="stylesheet">  --}}

        <link rel="stylesheet" type="text/css" href="{{ asset('src/css/bootstrap.min.css')}}">

        <link rel="stylesheet" type="text/css" href="{{ asset('src/css/selectize.bootstrap3.css')}}">


        <link href="{{asset('src/css/style.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

        {{--  //javascript scripts  --}}
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
        integrity="sha256-HmfY28yh9v2U4HfIXC+0D6HCdWyZI42qjaiCFEJgpo0="
        crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{asset('src/js/bootstrap.min.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('src/js/selectize.js')}}"></script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  --}}


    </head>

    <body>
        @include('partials.header')
        <div class="container-fluid">
            @include('partials.message') 
            @yield('content')
        </div>
    

    <script type="text/javascript">

      $('.product_id').select2({
        placeholder: 'Select an item',
        ajax: {
          url: '/select2-autocomplete-ajax',
          dataType: 'json',
          delay: 100,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.name,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      }); 

</script>


{{-- <script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script> --}}


    <script type="text/javascript">
        function totalAmount(){
            var t = 0;
            $('.amount').each(function(i,e){
                var amt = $(this).val()-0;
                t += amt;
            });
        }
        $(function () {
            $('.getmoney').change(function(){
                var total = $('.total').html();
                var getmoney = $(this).val();
                var t = getmoney - total;
                $('.backmoney').val(t).toFixed(2);
            });
            

            $( window ).load(function() {
                // Run code
                $('.tr_select').hide();
            });

            /*
            $('.add').click(function () {
                var product = $('.product_id').html();
                var n = ($('.neworderbody').length - 0) + 1;
                var tr = '<tr><td class="no">' + n + '</td>' + '<td><select class="selectpicker form-control product_id " data-show-subtext="true" data-live-search="true" name="product_id[]">' + product + '</select></td>' +
                    '<td><input type="text" class="qty form-control" name="qty[]" value="{{ old('
                email ') }}"></td>' +
                    '<td><input type="text" class="price form-control" name="price[]" value="{{ old('
                email ') }}"></td>' +
                    '<td><input type="text" class="amount form-control" name="amount[]"></td>' +
                    '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';

                $('.neworderbody').append(tr);
            });
            */
            var script = document.createElement( 'script' );
                script.type = 'text/javascript';
                script.src = "{{asset('src/js/tableSelect.js')}}";
               // $("#tab_logic").append( script );

            var i=0;
    
            /*
            $(".add").click(function(){
                var tt = $('.tr_select:first').html();

                
                //b=i-1;
                //$('#tr_'+i).html($('#tr_'+b).html()).find('td:first-child').html(i+1);
                
                //$('.neworderbody').append('<tr class="tr_select">'+tt+'</tr>');
                $('.neworderbody').table.insertRow(0);
                i++;
                $('.tr_select').show();
            });
            */
            /*
            $('.neworderbody').delegate('.delete', 'click', function () {
                $(this).parent().parent().remove();
                totalAmount();
            });
            */
            /*
            $('.neworderbody').delegate('.product_id', 'change', function () {
                var tr = $(this).parent().parent();
                var price = tr.find('.product_id option:selected').attr('data-price');
                tr.find('.price').val(price);
                
                var qty = tr.find('.qty').val() - 0;
                var price = tr.find('.price').val() - 0;
            
                var total = (qty * price);
                tr.find('.amount').val(total);
                totalAmount();
            });
            $('.neworderbody').delegate('.qty', 'keyup', function () {
                var tr = $(this).parent().parent();
                var qty = tr.find('.qty').val() - 0;
                var price = tr.find('.price').val() - 0;
            
                var total = (qty * price);
                tr.find('.amount').val(total);
                totalAmount();
            });
            */
            $('#hideshow').on('click', function(event) {  
                $('#content').removeClass('hidden');
                $('#content').addClass('show'); 
                $('#content').toggle('show');
            });


        });
    
        //add-remove table
        $(document).ready(function(){
            var product = $('.product_id').html();
            var i=1;

            $("#add_row").click(function(){
                //$('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='mail"+i+"' type='text' placeholder='Mail'  class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text' placeholder='Mobile'  class='form-control input-md'></td>");
                
                $('#addr'+i).html('<td>' + (i+1) + '</td>' + '<td><select class="form-control product_id " name="product_id[]">' + product + '</select></td>' +
                    '<td><input type="text" class="qty form-control" name="qty[]" value="{{ old('
                    email ') }}"></td>' +
                        '<td><input type="text" class="price form-control" name="price[]" value="{{ old('
                    email ') }}"></td>' +
                        '<td><input type="text" class="amount form-control" name="amount[]"></td>' +
                        '<td><input type="button" class="btn btn-danger delete" value="x"></td>');
                $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
                i++;

                $('.product_id').select2({
        placeholder: 'Select an item',
        ajax: {
          url: '/select2-autocomplete-ajax',
          dataType: 'json',
          delay: 100,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.name,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      }); 
            });

            $("#delete_row").click(function(){
                if(i>1){
                $("#addr"+(i-1)).html('');
                i--;
                }
            });

            $('.tablebody').delegate('.product_id', 'change', function () {
                var tr = $(this).parent().parent();
                var price = tr.find('.product_id option:selected').attr('data-price');
                tr.find('.price').val(price);
                
                var qty = tr.find('.qty').val() - 0;
                var price = tr.find('.price').val() - 0;
            
                var total = (qty * price);
                tr.find('.amount').val(total);
                totalAmount();
            });
            $('.tablebody').delegate('.qty', 'keyup', function () {
                var tr = $(this).parent().parent();
                var qty = tr.find('.qty').val() - 0;
                var price = tr.find('.price').val() - 0;
            
                var total = (qty * price);
                tr.find('.amount').val(total);
                totalAmount();
            });

        });
    </script>
 
     {{--  <!-- DataTables JavaScript -->
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.responsive.js')}}"></script>  --}}

    {{--  <script>
        $(document).ready(function () {
            $('#dataTables').dataTable({
                "scrollY": "300px",
                "scrollCollapse": true,
                "paging": false,
                "ordering": false
            });
        });
    </script>  --}}
 
  </body>

</html>