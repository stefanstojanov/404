@extends('layouts.app')
    @section('content')

        <div class="profile-container">
            <div class="profile-card">
                <div class="label-pair">
                  <h3>Име :&nbsp</h3>
                  <h3 style="margin-right:50px;">{{$user->first_name}}</h3>
                    <h3>Презиме :&nbsp</h3>
                    <h3>{{$user->last_name}}</h3>
                </div>
                <div class="label-pair">
                    <h3>ЕМБГ : &nbsp</h3>
                    <h3 style="margin-right:50px;">{{$user->EMBG}}</h3>
                    <h3>Емаил : &nbsp</h3>
                    <h3  style="margin-right:20px;">{{$user->email}}</h3>
                </div>
                <div class="label-pair">
                    <h3>Тип на профил : &nbsp</h3>
                    <h3>{{$user->type}}</h3>
                </div>
                <div class="label-pair">
                    <h3>Град : &nbsp</h3>
                    <h3 style="margin-right:50px;">{{$user->address->city}}</h3>
                    <h3>Дата на раѓање : &nbsp</h3>
                    <h3>{{$user->created_at->toFormattedDateString()}}</h3>
                </div>
                <div class="label-pair">
                    <h3>Осигуран преку : &nbsp</h3>
                    <h3 style="margin-right:50px;">{{$user->institution->name}}</h3>
                    <h3 >Мобилен : &nbsp</h3>
                    <h3>{{$user->mobile}}</h3>
                </div>


    <hr>
        @if(Auth::Check() && (auth()->user()->isMaticen() || auth()->user()->isPacient()))
        <h1>Провери историја на резултати за :</h1>
        <form action="/showResults" method="post">
            {{csrf_field()}}
            <select name="item_id">
                @foreach($items as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
            </select>
            <button type="submit">Pero</button>
        </form>
        @endif

           @if($user->isAdministrator())
                <center>  
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
                <h1>Pacienti</h1><br>
                @foreach($pacienti as $pacient)
                    <p>{{$pacient->name}}</p>
                    <a href="/new_msg/{{$pacient->id}}">Kontaktiraj pacient</a>
                     <a href="/edit_pacient/{{$pacient->id}}">Izmeni pacient</a>
                    @endforeach
            @endif
            </div>
        </div>
    @endsection