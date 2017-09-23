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
                            <div class="col-md-6 col-md-offset-1 register-form">
                                <h3 class="h3 padding-2">Add User</h3>
                                <form method="post" action="{{route('auth.register')}}">
                                {{csrf_field()}}
                                    <div class="col-md-6 form-group user-name">
                                        <label for="userName">Name</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user-circle-o"></i></div>
                                            <input type="text" class="form-control" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group email">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputPassword1">Confirm Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-unlock"></i></div>
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputPassword1">Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input type="number" class="form-control" name="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputPassword1">Joining Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input type="date" class="form-control" name="date" placeholder="date">
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="address" rows="5" cols="100"></textarea>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-default register-btn">Register</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.panel -->
        </div>

@endsection