@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="{{url('client/reservations/'.$id.'/room')}}">


            {{csrf_field()}}
            <div class="form-group">
                <label for="RoomAccompany">Accompany Number</label>
                <input type="number" class="form-control" id="RoomAccompany" name="accompany_number">

            </div>


            <button type="submit" class="btn btn-success">Confirm</button>
        </form>
    </div>
@endsection