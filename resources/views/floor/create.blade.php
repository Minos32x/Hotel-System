@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/floors">
                        {{ csrf_field() }}

                        

                       
                       

                         <div class="form-group{{ $errors->has('no_of_room') ? ' has-error' : '' }}">
                            <label for="no_of_room" class="col-md-4 control-label">Number Of Rooms</label>

                            <div class="col-md-6">
                                <input id="no_of_room" type="text" class="form-control" name="no_of_room" value="{{ old('no_of_room') }}" required>

                                @if ($errors->has('no_of_room'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_of_room') }}</strong>
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
