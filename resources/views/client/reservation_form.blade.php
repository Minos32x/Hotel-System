@extends('layouts.app')

@section('content')

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert-danger">{{ $error }}</div>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/client/payment/{{$room->id}}/room">



            <div class="form-group">
                <label for="RoomAccompany">Accompany Number</label>
                <input type="number" class="form-control" id="RoomAccompany" max="{{$room->capacity}}"name="accompany_number">

            </div>
            @if(session()->has('message'))
                <div class="alert-danger"> Error</div>
                @endif


            <button type="submit" class="btn btn-success">Confirm</button>
            
    </div>
 

@endsection