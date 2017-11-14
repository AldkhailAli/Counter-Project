@extends('layout.app')

@section('content')
@if($teachers != null)
@foreach($teachers as $teacher)

<strong> {{ $teacher->name }} </strong>

@endforeach
@else
<strong> Not found any teacher </strong>
@endif
@endsection