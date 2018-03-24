@extends('layouts.app')
@include('layouts.nav')
@section('content')
    <div class="container" style="margin-top:10%;">
        <div class="row col-md-12">
            <div class="col-md-3">
            <h1>Inbox</h1>
            @include('messages.box')
            </div>
            <div class="col-md-9">
                <div class="form-group col-md-9" style="background:white;">
                    <div class="profile-card">
                        <h1>To: {{$user->first_name}}</h1>
                        <hr style="background-color:#00a4a2;">
                        <form method="POST" action="/send_msg">
                            {{csrf_field()}}
                            <h5>Naslov</h5><input type="text" name="title" class="input" placeholder="Vnesi naslov..."><br>
                            <h5>Tekst</h5><textarea type="text" name="text" class="input" rows="4" placeholder="Vnesi tekst..."></textarea>
                            <input type="hidden" name="to_user" value="{{$user->id}}">
                            <br>
                            <button type="submit" class="submit_message">Isprati</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection