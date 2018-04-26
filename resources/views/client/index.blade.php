@extends('layouts.app')

<style>
    .navbar-fixed-left {
        width: 140px;
        position: fixed;
        border-radius: 0;
        height: 91%;
        margin-top: 0px;
    }

    .navbar-fixed-left .navbar-nav > li {
        float: none; /* Cancel default li float: left */
        width: 139px;
    }

    .navbar-fixed-left + .container {
        padding-left: 160px;
    }

    /* On using dropdown menu (To right shift popuped) */
    .navbar-fixed-left .navbar-nav > li > .dropdown-menu {
        margin-top: -50px;
        margin-left: 140px;
    }
</style>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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


@endsection

