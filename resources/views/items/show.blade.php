@extends('layouts.app')
@include('layouts.nav')
    @section('content')
        <div style="width:100%;display:flex;flex-direction:column;justify-content:center;align-items:center;">
            <h3>Pregled na item</h3>
            <div class="card col-md-6" style="border:1px solid #00a4a2;">
                <div class="card-header" style="background-color:#00a4a2">

                </div>
            </div>
        </div>
        <h1>{{$item->name}}</h1>
        <h2>{{$item->description}}</h2>
    @endsection