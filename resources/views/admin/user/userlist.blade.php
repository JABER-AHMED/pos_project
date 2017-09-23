@extends('layouts.adminmaster')

@section('title')

@endsection

@section('content')

	        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 page-header">
                    <h1 class=" text-left">Users List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Employees
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-plain table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>User Name </th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Joining Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $value)
                                    <tr class="odd gradeX">
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->address}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->date}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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