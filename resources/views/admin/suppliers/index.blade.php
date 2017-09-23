@extends('layouts.adminmaster')

@section('title')

@endsection

@section('content')

	
        

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Suppliers List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Product Suppliers
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-plain table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Suppliers Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($suppliers as $supply)
                                    <tr class="odd gradeX">
                                        <td>{{$supply->name}}</td>
                                        <td>{{$supply->phone}}</td>
                                        <td>{{$supply->address}}</td>
                                        <td class="text-center">
                                            <a type="button" class="btn btn-info" href="{{route('suppliers.create', $supply->id)}}"><i class="fa fa-edit"></i></a>
                                            <a type="button" class="btn btn-danger" href="{{route('suppliers.delete', $supply->id)}}"><i class="fa fa-trash"></i></a>
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
        <!-- /#page-wrapper -->
@endsection