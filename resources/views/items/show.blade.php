@extends('layouts.app')
@include('layouts.nav')
    @section('content')
        <div style="width:100%;display:flex;flex-direction:column;justify-content:center;align-items:center;">
             <div class="card col-md-6 p-0" style="border:1px solid #00a4a2; margin-top:100px; height:auto;">
                <div class="card-header m-0" style="background-color:#00a4a2; color:white; width:100%;">
                  <h3>Opis za stavkata</h3>  
                </div>
                <div class="card-body">
                <div class="d-flex">
                    <h2 style="width:50%;">Ime:</h2>
                    <h2 align="left">{{$item->name}}</h2>
                </div>
                <div class="d-flex">
                    <h2 style="width:50%;">Opis:</h2>
                    <h2 align="left">{{$item->description}}</h2>
                </div>
                <div class="d-flex">
                    <h2 style="width:50%;">Vrednosti i merka:</h2>
                    <h2 align="left">{{$item->min}}-{{$item->max}} {{$item->measure}}</h2>
                </div>
                </div>
                </div>
            </div>
    @endsection