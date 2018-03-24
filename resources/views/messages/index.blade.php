@extends('layouts.app')
@include('layouts.nav')
@section('content')

    <div class="container" style="margin-top:100px;">
        <div class="row col-md-12">
            <h1>Sandace</h1>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
             @include('messages.box')
            </div>
            <div class="form-group col-md-9" style="background:white; border:1px solid #00a4a2; box-shadow:1px 1px 2px 0.05px #00a4a2; border-radius:3px;">
                <table class="table">
                    <tr>
                        <td colspan="4" class="border-top-0" style="color:#00a4a2;"><h5>Sandace</h5></td>
                    </tr>
                    <tr style="color:#00a4a2;">
                       <td><b>Naslov</b></td>
                        <td><b>Isprakac</b></td>
                        <td><b>Primac</b></td>
                        <td><b>Status</b></td>
                    </tr>
                    @if($messages->isEmpty())
                        <tr>
                            <td colspan="4"><p >Nemate novi poraki</p></td>
                        </tr>
                    @endif
                    @if(!$messages->isEmpty())
                        @foreach($messages as $message)
                            <tr  <?php if($message->opened=="opened"){?> style="color:grey;"<?php } ?>>

                                <td><a href="/message/{{$message->id}}"  <?php if($message->opened=="opened"){?> style="color:grey;"<?php } ?>>{{$message->title}}</a></td>
                                <td><a href="/profile/{{$message->sender}}"  <?php if($message->opened=="opened"){?> style="color:grey;"<?php } ?>>{{$message->sender}}</a></td>
                                <td>{{$message->created_at}}</td>
                                <td>{{$message->opened}}</td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>

