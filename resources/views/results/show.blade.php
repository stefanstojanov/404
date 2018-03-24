@extends('layouts.app')
@include('layouts.nav')
@section('content')
@if(!empty($stavki))

<div style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; height:100%;">
<table class="table table-bordered" style="width:40%; margin-top:10px">
    <tr style="background-color:#00a4a2; color:white">
    <th>Grad</th>
    <th>Ime na laboratorijata</th>
    <th>Kreirano na</th>
        <th>Pacient</th>
    </tr>

    <tr>
    <td>{{$laboratorija->city}}</td>
    <td>{{$laboratorija->institucija}}</td>
    <td>{{$result->created_at->format('l/ jS /F h:i:s A')}}</td>
        <td>{{$user->first_name}}</td>
    </tr>
</table>
    
<table class="table table-bordered" style="width:40%; margin-top:10px">
    <tr style="background-color:#00a4a2; color:white">
    <th>Stavka</th>
    <th>Vrednost</th>
    <th>Merna edinica</th>
    <th>Granici</th>

    </tr>
@foreach($stavki as $stavka)
    <tr>
    <td><a href="/item/{{$stavka->id}}">{{$stavka->name}}</a></td>
    <td>{{$stavka->value}}</td>
    <td>{{$stavka->measure}}</td>
    <td>{{$stavka->min}}-{{$stavka->max}}</td>

        
    @endforeach
    @endif
    </tr>
</table>
    <a href="/napravi_pdf/{{$result->id}}">Printaj PDF</a>
@endsection