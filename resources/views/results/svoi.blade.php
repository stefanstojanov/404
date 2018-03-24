@extends('layouts.app')
    @section('content')
        <div style="margin-left:100px;">
            @foreach($rezultati as $result)
                <a href="/result/{{$result->id}}">{{$result->created_at->format('l/ jS /F h:i:s A')}}</a><br>
            @endforeach
        </div>
    @endsection