@extends('layouts.app')
@include('layouts.nav')
    @section('content')
<center>
<div class="card" style="border:1px solid #00a4a2; margin-top:100px; width:40%">
    <div class="card-header" style="width:100%; background-color:00a4a2; color:white;"> Профил </div>
    <div class="card-body">    
        <div class="d-flex" style="margin-bottom:10px;">
                      <h3>Име :&nbsp</h3>
                  <h3 >{{$user->first_name}}</h3>
        </div>
        <div class="d-flex" style="margin-bottom:10px;">
                    <h3>Презиме :&nbsp</h3>
                    <h3>{{$user->last_name}}</h3>
        </div>
        <div class="d-flex" style="margin-bottom:10px;">
                    <h3>ЕМБГ : &nbsp</h3>
                    <h3 >{{$user->EMBG}}</h3>
        </div>
        <div class="d-flex" style="margin-bottom:10px;">
                    <h3>Емаил : &nbsp</h3>
                    <h3  >{{$user->email}}</h3>
        </div>     
        <div class="d-flex" style="margin-bottom:10px;">
                    <h3>Тип на профил : &nbsp</h3>
                    <h3>{{$user->type}}</h3>
        </div>
        <div class="d-flex" style="margin-bottom:10px;">
                    <h3>Град : &nbsp</h3>
                    <h3 >{{$user->address->city}}</h3>
        </div>
            <div class="d-flex" style="margin-bottom:10px;">
                    <h3>Дата на раѓање : &nbsp</h3>
                    <h3>{{$user->created_at->toFormattedDateString()}}</h3>
        </div>
               <div class="d-flex" style="margin-bottom:10px;">
                    <h3>Осигуран преку : &nbsp</h3>
                    <h3 >{{$user->institution->name}}</h3>
        </div>
        <div class="d-flex" style="margin-bottom:10px;">
                    <h3 >Мобилен : &nbsp</h3>
                    <h3>{{$user->mobile}}</h3>
        </div>
</div>
</center>

    <hr>
        @if(Auth::Check() && (auth()->user()->isMaticen() || auth()->user()->isPacient()))
        <center>
                <h1>Провери историја на резултати за :</h1>
        <form action="/showResults" method="post">
            {{csrf_field()}}
            <div class="form-group">
            <select name="item_id" class="form-control" style="width:40%">
                @foreach($items as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
            </select>
                </div>
            <button type="submit" class="btn">Провери</button>
        </form>
        @endif

           @if($user->isAdministrator())
                  
                <h1>Pending users</h1>
                <table class="table table-bordered" style="width:40%; margin-top:10px; text-align:center;">
                 <tr style="background-color:#00a4a2; color:white">
                    <th>Корисник</th>
                    <th>Акција</th>
                </tr>
                    @foreach($pendings as $pending)
                    <tr>
                        <td>{{$pending->first_name}}</td>
                        <td><button class="btn"><a href="/approve/{{$pending->id}}">Approve user</a></button>
                        <button class="btn"><a href="/decline/{{$pending->id}}">Decline user</a></button></td>
                    </tr> 
                    @endforeach
                </table>
                </center>  
            @endif


            @if(auth()->user()->isMaticen())
                <center>
                <h1>Pacienti</h1>
                <table class="table table-bordered" style="width:40%; margin-top:10px; text-align:center;">
                    <tr style="background-color:#00a4a2; color:white">
                    <th>Корисник</th>
                    <th>Акција</th>
                </tr>
                @foreach($pacienti as $pacient)
                    <tr>
                    <td><a href="/profile/{{$pacient->id}}">{{$pacient->name}}</a></td>
                    <td><button class="btn"><a href="/new_msg/{{$pacient->id}}">Контактирај пациент</a></button>
                     <button class="btn"><a href="/edit_pacient/{{$pacient->id}}">Измени пациент</a></button></td>
                    </tr>
                    @endforeach
                </table>
                    </center>
            @endif
            </div>
        </div>
    @endsection