@extends('Admin.admin_template')

@section('content')
{!! $dataTable->table() !!}


@push('js')

{!! $dataTable->scripts() !!}
@endpush
@endsection

