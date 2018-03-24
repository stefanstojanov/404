@extends('layouts.app')
@include('layouts.nav')
    @section('content')
<div style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; height:100%;">
        <h2>Внесете ги резултатите од лабораторискиот испит</h2>
    <div class="row">  
    <div class="col">
        <select name="pero" id="maticen" onchange="smeni_pacient(this)" class="form-control">

            <option></option>
            @foreach($maticni as $maticen)
                <option value="{{$maticen->id}}" placeholder="Матичен доктор">{{$maticen->first_name}}</option>
            @endforeach

        </select>
            </div>
        <form method="POST" action="/vnesi_rez" style="width:50%;">
            <div class="col">
            <div class="form-group">
            {{csrf_field()}}

            <select name="user_id" id="pacient" class="form-control">
                <option></option>

                @foreach($pacienti as $pacient)
                    <option id="{{$pacient->maticen_id}}" value="{{$pacient->id}}" placeholder="Пациент">{{$pacient->first_name}}</option>
                 @endforeach
            </select>
            </div>
            </div>
</div>  
            @foreach($items as $item)
            <div class="row">
            {{$item->name}}
            <div class="col">
            <div class="form-group">
                <input type="hidden" name="name{{$item->id}}" value="{{$item->name}}" class="form-control" placeholder="Пациент" >
                <input type="text" name="value{{$item->id}}" class="form-control" placeholder="Вредност за {{$item->name}} ">
                <input type="hidden" name="item_id{{$item->id}}" value="{{$item->id}}" class="form-control" placeholder="Пациент">
            </div>
            </div>
            </div>
            @endforeach

            <button type="submit" class="btn btn-primary" style="background-color:#00a4a2">Потврди</button>
        </form>
</div>
    @endsection