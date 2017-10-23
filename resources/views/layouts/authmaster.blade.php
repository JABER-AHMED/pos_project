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

    <link rel="stylesheet" type="text/css" href="{{ asset('src/css/selectize.bootstrap3.css')}}">


    <link href="{{asset('src/css/style.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> {{-- //javascript scripts --}}
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js" integrity="sha256-HmfY28yh9v2U4HfIXC+0D6HCdWyZI42qjaiCFEJgpo0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('src/js/bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('src/js/selectize.js')}}"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


</head>

<body>
    @include('partials.header')
    <div class="container">
        @include('partials.message') @yield('content')
    </div>


    <script type="text/javascript">
        $('.product_id').select2({
            placeholder: 'Select an item',
            ajax: {
                url: '/select2-autocomplete-ajax',
                dataType: 'json',
                delay: 100,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
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

    <script type="text/javascript">
        function totalAmount() {
            var t = 0;
            $('.amount').each(function(i, e) {
                var amt = $(this).val() - 0;
                t += amt;
            });

            total = 0;
                $('.amount').each(function() {
                    total += parseInt($(this).val());
                });
                $('#sub_total').val(total.toFixed(2));
                var tax_sum = total / 100 * $('#tax').val();
                $('#vat_amount').val(tax_sum.toFixed(2));
                var discount_sum = total / 100 * $('#discount').val();
                $('#discount_amount').val(discount_sum.toFixed(2));
                $('#total_amount').val(((total + tax_sum) - discount_sum).toFixed(2));
        }
        $(function() {
            $('.getmoney').change(function() {
                var total = $('#total_amount').val();
                var getmoney = $(this).val();
                var t = getmoney - total;
                $('.backmoney').val(t).toFixed(2);
            });


            $(window).load(function() {
                // Run code
                $('.tr_select').hide();
            });

            var i = 0;

            $('#hideshow').on('click', function(event) {
                $('#content').removeClass('hidden');
                $('#content').addClass('show');
                $('#content').toggle('show');
            });


        });

        //add-remove table
        $(document).ready(function() {
            var product = $('.product_id').html();
            var i = 1;

            $("#add_row").click(function() {

                $('#addr' + i).html('<td>' + (i + 1) + '</td>' + '<td><select class="form-control product_id " name="product_id[]">' + product + '</select></td>' +
                    '<td><input type="number" class="qty form-control" name="qty[]" value="{{ old('
                    email ') }}"></td>' +
                    '<td><input type="number" class="price form-control" name="price[]" value="{{ old('
                    email ') }}"></td>' +
                    '<td><input type="number" class="amount form-control" name="amount[]" readonly></td>' +
                    '<td><i type="button" class="btn btn-danger delete fa fa-trash-o" aria-hidden="true"></i></td>');
                $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
                i++;

                $('.product_id').select2({
                    placeholder: 'Select an item',
                    ajax: {
                        url: '/select2-autocomplete-ajax',
                        dataType: 'json',
                        delay: 100,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
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

            $('.tablebody').delegate('.delete', 'click', function () {
                $(this).parent().parent().remove();
                 totalAmount();
            });

            $('.tablebody').delegate('.product_id', 'change', function() {
                var tr = $(this).parent().parent();
                var price = tr.find('.product_id option:selected').attr('data-price');
                tr.find('.price').val(price);

                var qty = tr.find('.qty').val() - 0;
                var price = tr.find('.price').val() - 0;

                var total = (qty * price);
                tr.find('.amount').val(total);
                totalAmount();
            });
            $('.tablebody').delegate('.qty', 'keyup', function() {
                var tr = $(this).parent().parent();
                var qty = tr.find('.qty').val() - 0;
                var price = tr.find('.price').val() - 0;

                var total = (qty * price);
                tr.find('.amount').val(total);
                totalAmount();
            });

            $('#tab_logic tbody tr').on('keyup change', function() {
                calc();
            });

            $('#tax').on('keyup change', function() {
                totalAmount();
            });

            $('#discount').on('keyup change', function() {
                totalAmount();
            });


            function calc() {
                $('#tab_logic tbody tr').each(function(i, element) {
                    var html = $(this).html();
                    if (html !== '') {
                        var qty = $(this).find('.qty').val();
                        var price = $(this).find('.price').val();
                        $(this).find('.amount').val(qty * price);

                        totalAmount();
                    }
                });
            }
        });
    </script>

</body>

</html>