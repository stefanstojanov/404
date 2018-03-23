<form method="POST" action="/vnesi_rez">
    {{csrf_field()}}
@foreach($items as $item)
{{$item->name}} <br>
<input type="hidden" name="name{{$item->id}}">
<input type="text" name="value{{$item->id}}">
<input type="hidden" name="item_id{{$item->id}}" value="{{$item->id}}">
    @endforeach
    <button type="submit">Potvrdi</button>
</form>