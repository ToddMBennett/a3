@extends('layouts.master')

@push('head')
  <link rel="stylesheet" href="/css/calculations/show.css">
@endpush

@section('title')
  {{$title}}
@endsection

@section('content')
  <h1>Each person should pay: {{$calculate}}
@endsection

@push('body')
  <script type="text/javascript">

  </script>
@endpush
