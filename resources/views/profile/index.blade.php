@extends('layouts.app')
@include('layouts.nav')
    @section('content')
<center>
<div class="card" style="border:1px solid #00a4a2; margin-top:100px; width:40%">
    <div class="card-header" style="width:100%; background-color:00a4a2; color:white;">Profil </div>
    <div class="card-body">    
        <div class="d-flex" style="margin-bottom:10px;">
                      <h3>Ime :&nbsp</h3>
                  <h3 >{{$user->first_name}}</h3>
        </div>
        <div class="d-flex" style="margin-bottom:10px;">
                    <h3>Prezime :&nbsp</h3>
                    <h3>{{$user->last_name}}</h3>
        </div>
        <div class="d-flex" style="margin-bottom:10px;">
                    <h3>EMBG : &nbsp</h3>
                    <h3 >{{$user->EMBG}}</h3>
        </div>
        <div class="d-flex" style="margin-bottom:10px;">
                    <h3>Email : &nbsp</h3>
                    <h3  >{{$user->email}}</h3>
        </div>     
        <div class="d-flex" style="margin-bottom:10px;">
                    <h3>Tip na profil : &nbsp</h3>
                    <h3>{{$user->type}}</h3>
        </div>
        <div class="d-flex" style="margin-bottom:10px;">
                    <h3>Grad : &nbsp</h3>
                    <h3 >{{$user->address->city}}</h3>
        </div>
            <div class="d-flex" style="margin-bottom:10px;">
                    <h3>Data na raganje : &nbsp</h3>
                    <h3>{{$user->created_at->toFormattedDateString()}}</h3>
        </div>
               <div class="d-flex" style="margin-bottom:10px;">
                    <h3>Osiguran preku : &nbsp</h3>
                    <h3 >{{$user->institution->name}}</h3>
        </div>
        <div class="d-flex" style="margin-bottom:10px;">
                    <h3 >Mobilen : &nbsp</h3>
                    <h3>{{$user->mobile}}</h3>
        </div>
</div>
</center>

    <hr>
        @if(Auth::Check() && (auth()->user()->isMaticen() || auth()->user()->isPacient()))
        <center>
                <h1>Proveri istorija za :</h1>
        <form action="/showResults" method="post">
            {{csrf_field()}}
            <div class="d-flex justify-content-center align-content-center mb-2">
                <label class="mr-3">Item</label>
                <select name="item_id" class="form-control" style="width:40%">
                    @foreach($items as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                </select>
                <input type="hidden" name="user_id" value="{{$user->id}}">
                </div>
            <div class="d-flex" style="width:100%;align-items:center;justify-content:center;">
                <button type="submit" class="btn" style="margin-right:15px;">Proveri item</button>
                @if(auth()->user()->isMaticen() && $user->id!==auth()->user()->id)
                    <button class="btn"><a href="/svoi_rez/{{$user->id}}" style="color:inherit;">Proveri rezultati za {{$user->first_name}}</a></button
                @endif
            </div>
        </form>
        @endif

           @if($user->isAdministrator())
                  
                <h1>Korisnici sto ne se odobreni</h1>
                <table class="table table-bordered" style="width:40%; margin-top:10px; text-align:center;">
                 <tr style="background-color:#00a4a2; color:white">
                    <th>Korisnik</th>
                    <th>Akcija</th>
                </tr>
                    @foreach($pendings as $pending)
                    <tr>
                        <td>{{$pending->first_name}}</td>
                        <td><button class="btn"><a href="/approve/{{$pending->id}}">Odobri</a></button>
                        <button class="btn"><a href="/decline/{{$pending->id}}">Odbij</a></button></td>
                    </tr> 
                    @endforeach
                </table>
                </center>  
            @endif


            @if(auth()->user()->isMaticen()&&$user->id===auth()->user()->id)
                <center>
                <h1>Pacienti</h1>
                <table class="table table-bordered" style="width:40%; margin-top:10px; text-align:center;">
                    <tr style="background-color:#00a4a2; color:white">
                    <th>Korisnik</th>
                    <th>Akcija</th>
                </tr>
                @foreach($pacienti as $pacient)
                    <tr>
                    <td><a href="/profile/{{$pacient->id}}">{{$pacient->name}}</a></td>
                    <td><button class="btn"><a href="/new_msg/{{$pacient->id}}">Kontaktiraj pacient</a></button>
                     <button class="btn"><a href="/edit_pacient/{{$pacient->id}}">Izmeni pacient</a></button></td>
                    </tr>
                    @endforeach
                </table>
                    </center>
            @endif

            </div>
        </div>
    @endsection