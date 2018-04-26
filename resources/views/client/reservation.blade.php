@extends('layouts.app')


@section('content')
    <h1>Avialable Rooms</h1>
    {!! $dataTable->table() !!}

    @push('js')

        {!! $dataTable->scripts() !!}

    @endpush
@endsection




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

