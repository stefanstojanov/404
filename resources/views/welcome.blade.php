@extends('layouts.app')
@section('content')
@if(!empty($message))
    <h1>{{$message}}</h1>
    @endif
@endsection

