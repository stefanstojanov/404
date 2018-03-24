@extends('layouts.app')
@section('content')
    <div class="profile-container">
        <div class="profile-card">
            <h1>TO: {{$user->first_name}}</h1>
            <form method="POST" action="/send_msg">
                {{csrf_field()}}
                Title<br><input type="text" name="title"><br>
                Text<br><input type="text" name="text">
                <input type="hidden" name="to_user" value="{{$user->id}}">
                <button type="submit">Isprati</button>
            </form>
        </div>
    </div>
@endsection