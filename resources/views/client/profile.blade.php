@extends('layouts.app')

@section('content')
    <div ><a href="{{ url('client/editProfile/'.$user->id) }}" class="btn btn-warning">Edit Profile</a> </div>
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                        <img alt="User Pic" src="{{ asset('storage/avatars/'.$user->avatar) }}" id="profile-image1"
                             class="img-circle img-responsive">

                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                        <div class="container">
                            <h2>{{$user->name}}</h2>


                        </div>
                        <hr>
                        <ul class="container details">

                            <li><p><span class="glyphicon glyphicon-phone" style="width:50px;"></span>{{$user->phone}}
                                </p></li>
                            <li><p><span class="glyphicon glyphicon-flag" style="width:50px;"></span>{{$user->country}}
                                </p></li>
                            <li><p><span class="glyphicon glyphicon-envelope one"
                                         style="width:50px;"></span>{{$user->email}}</p></li>
                        </ul>
                        <hr>
                        <div class="col-sm-5 col-xs-6 tital "><span class="glyphicon glyphicon-calendar"></span> Date Of Joining: {{$user->created_at}}</div>
                        <br>
                        <div class="col-sm-5 col-xs-6 tital "><span class="glyphicon glyphicon-calendar"></span> Last Visit: {{$user->last_login}}</div>
                    </div>
                </div>
            </div>
        </div>
@endsection
