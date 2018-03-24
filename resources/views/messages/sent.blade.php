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
            <div class="form-group col-md-9" style="background:white; border:1px solid #00a4a2; box-shadow:1px 1px 2px 0.05px #00a4a2; border-radius:3px;">
                <table class="table ">
                    <tr>
                        <td colspan="4" class="border-top-0" style="color:#00a4a2;"><h5>SENT MESSAGES</h5></td>
                    </tr>
                    <tr style="color:#00a4a2;">
                        <td ><b>TITLE</b></td>
                        <td><b>SENT TO</b></td>
                        <td><b>SENT AT</b></td>
                    </tr>
                    @if($messages->isEmpty())
                        <tr>
                            <td colspan="4"><p >You have no new messages</p></td>
                        </tr>
                    @endif
                    @if(!$messages->isEmpty())
                        @foreach($messages as $message)
                            <tr>

                                <td><a href="/message/{{$message->id}}">{{$message->title}}</a></td>
                                <td><a href="profile/{{$message->receiver}}">{{$message->receiver}}</a></td>
                                <td>{{$message->created_at}}</td>

                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>


@endsection