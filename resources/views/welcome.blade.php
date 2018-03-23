@extends('layouts.app')
@section('content')
@if(!empty($message))
    <h1>{{$message}}</h1>
    @endif
    <a href="{{ url('/vnesi_pacient')}}" class="btn" role="button">Внеси</a>

@if(!empty($EMBG) || !empty($approved))
<p>{{$EMBG}}</p>
<p>{{$approved}}</p>

<hr>
@if(!empty($message))
    <h1>{{$message}}</h1>
@endif

@if(Auth::check() && auth()->user()->isLaborant())
    <a href="/novi_rez">Vnesi rezultati</a>
@endif

@endif
@endsection








