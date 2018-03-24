@extends('layouts.app')
    @section('content')
        <form method="post" action="/edit_result">
            {{csrf_field()}}
            <?php $i=1; ?>
        @foreach($stavki as $stavka)
                <h3>Ime</h3><h3>{{$stavka->name}}</h3><br>
                <input type="hidden" value="{{$result->id}}" name="result_id">
                <h3>Vrednost</h3><input type="text" name="value{{$i}}" value="{{$stavka->value}}"><br>
                <input type="hidden" value="{{$stavka->item_id}}" name="item_id{{$i}}">
            <?php $i++ ?>
        @endforeach
            <button type="submit">Ajde</button>
        </form>

    @endsection