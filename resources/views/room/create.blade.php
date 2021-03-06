




@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <div class="alert-danger">{{ $error }}</div>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-heading">Create Room</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/rooms">
                        {{ csrf_field() }}

                        

                       
                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">Room Number</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control" name="number" value="{{ old('floor_num') }}" required>

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                            <label for="capacity" class="col-md-4 control-label">Capacity Of Room</label>

                            <div class="col-md-6">
                                <input id="capacity" type="text" class="form-control" name="capacity" value="{{ old('no_of_room') }}" required>

                                @if ($errors->has('capacity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label"> Price </label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('no_of_room') }}" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       

                         <div class="form-group{{ $errors->has('floor_id') ? ' has-error' : '' }}">
                            <label for="floor_id" class="col-md-4 control-label">Floor Number</label>

                            <div class="col-md-6">
                            <select class="form-control" name="floor_id">
                            @foreach ($floors as $floor)
                                <option value="{{$floor->id}}">{{$floor->floor_num}}</option>
                            @endforeach

                            </select>
                                 @if ($errors->has('floor_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('floor_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       



                        
                       

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



