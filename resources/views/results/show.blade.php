@extends('layouts.app')
@include('layouts.nav')
@section('content')
@if(!empty($stavki))

<div style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; height:100%;">
<table class="table table-bordered" style="width:40%; margin-top:10px">
    <tr style="background-color:#00a4a2; color:white">
    <th>Град</th>
    <th>Име на лабораторијата</th>
    <th>Краирано на</th>
    </tr>

    <tr>
    <td>{{$laboratorija->city}}</td>
    <td>{{$laboratorija->institucija}}</td>
    <td>{{$result->created_at}}</td>

    </tr>
</table>
    
<table class="table table-bordered" style="width:40%; margin-top:10px">
    <tr style="background-color:#00a4a2; color:white">
    <th>Ставка</th>
    <th>Вредност</th>
    <th>Мерна единица</th>
    <th>Мин-Макс</th>
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