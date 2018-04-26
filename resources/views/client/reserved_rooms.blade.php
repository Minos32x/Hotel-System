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
    <h1>Reserved Rooms</h1>

{!! $dataTable->table() !!}


@push('js')


    {!! $dataTable->scripts() !!}

@endpush
@endsection
