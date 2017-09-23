@extends('layouts.master')

@section('title')

@endsection

@section('content')
 <div id="login" class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-4 reset-form">

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Reset Password</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <form action="" method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input type="password" class="form-control" id="inputEmail" name="password" placeholder="Enter Password">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input type="password" class="form-control" id="inputEmail" name="password_confirmation" placeholder="Confirm Password">
                                    
                                </div>
                            </div>
                            <button type="submit" value="update password" class="btn btn-default reset-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection