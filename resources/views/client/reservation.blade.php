@extends('layouts.app')


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

<div class="container col-lg-6  col-md-8">
    <form method="POST" enctype="multipart/form-data" action="{{ route('client.reservation') }}">
        <div class="form-group">
            <label for="exampleInputTitle">Accompany Number</label>
            <input type="number" class="form-control" id="exampleInputTitle" name="num_company">

        </div>
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <div class="text-center"><input class="btn btn-success " type="submit" value="Reserve" name="submit">


        </div>

    </form>
</div>

@endsection