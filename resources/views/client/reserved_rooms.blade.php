@extends('layouts.app')

@section('content')

    <h1>Reserved Rooms</h1>

{!! $dataTable->table() !!}


@push('js')


    {!! $dataTable->scripts() !!}

@endpush
@endsection
