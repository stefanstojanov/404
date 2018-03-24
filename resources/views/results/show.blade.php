@if(!empty($stavki))
@foreach($stavki as $stavka)
    <a href="/item/{{$stavka->id}}">{{$stavka->name}}</a>
    <p>{{$stavka->value}}</p>
    @endforeach
    @endif
<a href="/napravi_pdf/{{$result->id}}">Printaj PDF</a>