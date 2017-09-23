@extends('layouts.adminmaster')

@section('title')

@endsection

@section('content')

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">

                <div class="col-lg-12">

                    <div id="register">

                        <div class="row">
                            <div class="col-md-8 register-form">
                                <h3 class="h3 padding-2">Add Supplier</h3>
                                <form method="post" action="{{route('suppliers.store', $supply->id)}}">
                                {{csrf_field()}}
                                    <div class="col-md-6 form-group user-name">
                                        <label for="userName">Supplier Name</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user-circle-o"></i></div>
                                            <input type="text" class="form-control" name="name" value="{{ $supply->name }}" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputPassword1">Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input type="number" class="form-control" value="{{$supply->phone}}" name="phone" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="address" rows="4" cols="100">{{$supply->address}}</textarea>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-default register-btn">Submit</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /#page-wrapper -->
@endsection