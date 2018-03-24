@extends('layouts.app')
@include('layouts.nav')
    @section('content')
<center>
<div class="card" style="border:1px solid #00a4a2; margin-top:100px; width:40%">
<div class="card-header" style="width:100%; background-color:00a4a2; color:white;"> Izmena na veke postoecki rezultat </div>    
    <div class="card-body">    
    <form method="post" action="/edit_result">
            {{csrf_field()}}
            <?php $i=1; ?>
        @foreach($stavki as $stavka)
            <div class="row">
                <div class="col">
            {{$stavka->name}}
                <input type="hidden" value="{{$result->id}}" name="result_id" class="form-group">
                <input type="text" name="value{{$i}}" value="{{$stavka->value}}" class="form-group">
                <input type="hidden" value="{{$stavka->item_id}}" name="item_id{{$i}}" class="form-group">
            <?php $i++ ?>
                </div>
                </div>
        @endforeach
            <button type="button" class="btn" style="background-color:00a4a2; color:white;">Ajde</button>
        </form>
    </div>
</div>
    </center>
    @endsection