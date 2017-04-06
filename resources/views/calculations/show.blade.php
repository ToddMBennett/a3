@extends('layouts.master')

@push('head')
  <link rel="stylesheet" href="/css/calculations/show.css">
@endpush

@section('result')
  Show calculations: {{$calculate}}
@endsection

@section('content')
  <h1>Show calculations: {{$calculate}}
@endsection

@push('body')
  <script type="text/javascript">

  </script>
@endpush
