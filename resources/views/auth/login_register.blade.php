@extends('layouts.master')


@section('title')

@endsection

@section('content')

    <div id="register" class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-4 register-form">

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Register Me</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <form action="{{route('auth.register')}}" method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" class="form-control" id="userName" name="name" placeholder="User Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input type="email" class="form-control" id="Email2" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-unlock"></i></div>
                                    <input type="password" class="form-control" name="password_confirmation" id="confirmPassword" placeholder="Confirm Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default register-btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection