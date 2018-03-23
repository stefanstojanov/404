@if(!empty($stavki))
@foreach($stavki as $stavka)
    <p>{{$stavka->name}}</p>
    <p>{{$stavka->value}}</p>
    @endforeach

    @endif