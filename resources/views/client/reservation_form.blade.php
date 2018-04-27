@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="get" action="/client/payment/{{$room->id}}/room">


            <div class="form-group">
                <label for="RoomAccompany">Accompany Number</label>
                <input type="number" class="form-control" id="RoomAccompany" max="{{$room->capacity}}"name="accompany_number">

            </div>


            <button type="submit" class="btn btn-success">Confirm</button>
            
    </div>
 

@endsection