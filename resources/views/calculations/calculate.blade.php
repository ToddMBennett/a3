@extends('layouts.master')

@push('head')
  		<link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endpush

@section('content')
    <label for="btn"></label>
        <button id="btn" type='button' class='alert alert-success'>{{ $calculate }}</button>
@endsection
