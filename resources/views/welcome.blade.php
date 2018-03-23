@extends('layouts.app')
@section('content')
@if(!empty($message))
    <h1>{{$message}}</h1>
    @endif
    <a href="{{ url('/vnesi_pacient')}}" class="btn" role="button">Внеси</a>

@if(!empty($EMBG) || !empty($approved))
<p>{{$EMBG}}</p>
<p>{{$approved}}</p>
@endif
@endsection

