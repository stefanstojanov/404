@extends('layouts.app')
@include('layouts.nav')
@section('content')

    <div class="container" style="margin-top:100px;">
        <div class="row col-md-12">
            <h1>Inbox</h1>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
            @include('messages.box')
            </div>
            <div class="form-group col-md-9"
                 style="background:white;
                        border:1px solid #00a4a2;
                        box-shadow:1px 1px 1px #00a4a2;
                        border-radius:3px;">

                <div class="row mt-3">
                    <h3 class="col-md-8 mb-0" >{{$message->title}}</h3>
                    <p class="col-md-4 pull-right mb-0" align="center"><i>Received message at : <br>{{$message->created_at->toDayDateTimeString()}}</i></p>
                </div>

                <p><b>&nbsp From : </b><a href="\profile\{{$message->user->username}}">{{$message->user->first_name}}</a></p>
                <hr>

                <div class="form-group">

                    @foreach($chats as $chat)

                        <div class="form-group col-md-12 ml-4">

                            <div class="row">
                                <h6 class="mt-3 ml-2" style=" padding-right:5px; padding-bottom:0px;"><a href="/profile/{{$chat->first_name}}">{{$chat->first_name}}</a> said </h6>
                                <p class="mt-3" style="border-left:1px solid #e0e0e0;padding-left:5px; color:#b5b5b5;">
                                    {{$chat->chats_date}}
                                </p>
                            </div>

                            <p class="col-md-12  ml-3">{{$chat->text}}</p>
                            <hr>

                        </div>
                    @endforeach

                    <form method="POST" action="/chat">
                        {{csrf_field()}}

                        <textarea class="form-control no-light" rows="4" placeholder="Write your reply here" name="text"></textarea>

                        <div class="form-group" align="right">
                            <input type="submit" class="btn btn-info mt-2">
                            <input type="hidden" name="message_id" value="{{$message->id}}">
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
