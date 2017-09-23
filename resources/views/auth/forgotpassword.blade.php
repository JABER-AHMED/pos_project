@extends('layouts.master')

@section('title')

@endsection

@section('content')
 <div id="login" class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-4 forget-form">

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Reset Password</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <form action="{{route('forgot-password')}}" method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter Email">
                                    
                                </div>
                            </div>
                            <button type="submit" value="send code" class="btn btn-default forget-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection