@extends('layouts.master')

@section('title')

@endsection

@section('content')
 <div id="login" class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-4 login-form">

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Log In</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <form action="{{route('auth.login')}}" method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter Email">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input type="password" class="form-control" name="password" id="inputPassword1" placeholder="Enter Password">
                                  
                                </div>
                            </div>

                            <div class="checkbox">
                                 <label class="text-left"> <input type="checkbox"> Remember Me</label>
                                 <label class="text-right right"><a href="{{ route('forgot.password') }}">Forget Password?</a></label>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection