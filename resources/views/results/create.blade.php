@extends('layouts.app')
@include('layouts.nav')
    @section('content')
<div style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; height:100%;">
        <h2>Внесете ги резултатите од лабораторискиот испит</h2>
            <div style="display:flex;flex-direction:row;width:30%;margin-bottom:10px;margin-top:50px;">
                <label style="width:20%;">Maticen</label>
                <select name="pero" id="maticen" onchange="smeni_pacient(this)" class="form-control">
                    <option></option>
                    @foreach($maticni as $maticen)
                        <option value="{{$maticen->id}}" placeholder="Матичен доктор">{{$maticen->first_name}}</option>
                    @endforeach
                </select>
            </div>

            <div style="display:flex;flex-direction:column;justify-content:center;align-items:center;width:100%;">
                 <form method="POST" action="/vnesi_rez" style="width:100%;display:flex;justify-content:center;">
                    {{csrf_field()}}
                     <div style="display:flex;flex-direction:row;justify-content:center;width:30%;">
                        <label style="width:20%; margin-right:5px;">Pacient</label>
                        <select name="user_id" id="pacient" class="form-control">
                            <option></option>

                            @foreach($pacienti as $pacient)
                                <option id="{{$pacient->maticen_id}}" value="{{$pacient->id}}" placeholder="Пациент">{{$pacient->first_name}}</option>
                             @endforeach
                        </select>
                     </div>
            </div>
            @foreach($items as $item)

                <div style="display:flex;flex-direction:column;width:30%">

                        <input type="hidden" name="name{{$item->id}}" value="{{$item->name}}" class="form-control" placeholder="Пациент" >
                    <div style="display:flex;flex-direction:row;width:100%;margin-bottom:10px;">
                        <label style="width:25%;">{{$item->name}}</label>
                        <input type="text" name="value{{$item->id}}" class="form-control" placeholder="Вредност за {{$item->name}} ">
                    </div>
                        <input type="hidden" name="item_id{{$item->id}}" value="{{$item->id}}" class="form-control" placeholder="Пациент">
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary" style="background-color:#00a4a2;border:none;">Потврди</button>
        </form>
</div>
    @endsection