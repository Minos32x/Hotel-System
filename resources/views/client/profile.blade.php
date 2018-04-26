@extends('layouts.app')

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@section('content')
    <div>


        <div class="navbar navbar-inverse navbar-top">
            <a class="navbar-brand" href="#">Brand</a>
            <ul class="nav navbar-nav">
                <li><a href="{{ route('client.profile') }}">My Profile</a></li>
                <li><a href="{{ route('client.reservation') }}">Make Reservation</a></li>
                <li><a href="{{ route('client.show') }}">My Reservations</a></li>

            </ul>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                        <img alt="User Pic" src="{{ asset($user->avatar) }}" id="profile-image1"
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
                        <div class="col-sm-5 col-xs-6 tital ">Date Of Joining: {{$user->created_at}}</div>
                        <br>
                        <div class="col-sm-5 col-xs-6 tital ">Last Visit: {{$user->last_login}}</div>
                    </div>
                </div>
            </div>
        </div>
@endsection
