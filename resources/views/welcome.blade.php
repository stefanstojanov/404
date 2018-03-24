@extends('layouts.app')
    @section('content')
        @if(!empty($message))
            <h1>{{$message}}</h1>
         @endif
        @if(Auth::check()&&auth()->user()->isMaticen())
         <a href="{{ url('/vnesi_pacient')}}" class="btn" role="button">Внеси</a>
        @endif
        @if(!empty($EMBG) || !empty($approved))
            <p>{{$EMBG}}</p>
            <p>{{$approved}}</p>

            <hr>
            @if(!empty($message))
                <h1>{{$message}}</h1>
            @endif

         @endif

        @if(!empty($error))
            {{$error}}
        @endif
    @endsection








