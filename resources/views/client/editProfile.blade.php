@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="{{url('client/editProfile/update/'.$user->id) }}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{ method_field('PUT') }}


            <div class="form-group">
                <label for="UserName">Name</label>
                <input type="text" class="form-control" id="UserName" name="name" value="{{$user->name}}">

            </div>
            <div class="form-group">
                <label for="UserEmail">Email</label>

                <input class="form-control" id="exampleInputDesc" name="email" value="{{$user->email}}">
            </div>


            <div class="form-group">
                <label for="UserPhone">Phone</label>
                <input type="text" class="form-control" id="UserPhone" name="phone" value="{{$user->phone}}">

            </div>

            <div class="form-group">
                <label for="UserGender">Gender</label>

                <select class="form-control form-control-lg" name="gender" value="{{$user->gender}}" +>
                    <option value="male" {{ $user->gender == "male" ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->gender == "female" ? 'selected' : '' }}>Female</option>
                </select>
            </div>


            <div class="form-group">
                <label for="UserCountry"> Country</label>
                <select class="form-control form-control-lg" name="country" value="{{$user->country}}">
                    @foreach($countries as $country)


                        <option selected='{{$user->country}}'> {{$country['name']}} {{$country['emoji']}} </option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="UserAvatar">Avatar</label>
                <input type="file" class="form-control" id="UserAvatar" name="avatar" value="{{$user->avatar}}">

            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection