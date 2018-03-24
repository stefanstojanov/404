@extends('layouts.app')
    @section('content')

        <select name="pero" id="maticen" onchange="smeni_pacient(this)">

            <option></option>
            @foreach($maticni as $maticen)
                <option value="{{$maticen->id}}">{{$maticen->first_name}}</option>
            @endforeach

        </select>

        <form method="POST" action="/vnesi_rez">
            {{csrf_field()}}

            <select name="user_id" id="pacient">
                <option></option>

                @foreach($pacienti as $pacient)
                    <option id="{{$pacient->maticen_id}}" value="{{$pacient->id}}">{{$pacient->first_name}}</option>
                 @endforeach
            </select>

            @foreach($items as $item)
                {{$item->name}} <br>
                <input type="hidden" name="name{{$item->id}}" value="{{$item->name}}">
                <input type="text" name="value{{$item->id}}">
                <input type="hidden" name="item_id{{$item->id}}" value="{{$item->id}}">

            @endforeach

            <button type="submit">Potvrdi</button>
        </form>
    @endsection