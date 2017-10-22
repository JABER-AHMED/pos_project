@extends('layouts.invoicemaster')
@section('title')
@endsection
@section('content')
<div class="container">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-10 col-md-offset-1">
                <h1 class="page-header">Invoice List</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of Invoices
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Invoice Id</th>
                                    <th>Total Amount</th>
                                    <th>Discount</th>
                                    <th>Vat</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                <tr class="odd gradeX">
                                    <td>{{$invoice->id}}</td>
                                    <td>{{$invoice->total_price}}</td>
                                    <td>{{$invoice->discount}}</td>
                                    <td>{{$invoice->vat}}</td>
                                    <td>{{$invoice->date}}</td>
                                    <td class="text-center">
                                        <a title="Delete" href="{{route('invoice.delete', $invoice->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        <a title="Edit" href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        <a title="View" href="{{route('invoice.index', $invoice->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
</div>
@endsection