<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<h1>Logged in as {{$user->first_name}}</h1>

@if($user->isAdministrator())
    <h1>Pending users</h1>
    @foreach($pendings as $pending)
        <p>{{$pending->first_name}}</p>
    <p>{{$pending->approved}}</p>
        <a href="/approve/{{$pending->id}}">Approve user</a>
        <a href="/decline/{{$pending->id}}">Decline user</a>
        <hr>
        @endforeach
@endif

<h1>Резултати</h1>
<form action="/showResults" method="post">
    {{csrf_field()}}
    <select name="item_id">
        @foreach($items as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
    </select>
    <button type="submit">Pero</button>
</form>
<table>
    <tr>
        <th>Дата на резултат</th>
        <th>Резултат</th>
    </tr>
    @if(!empty($results))
    @foreach($results as $result)
    <tr>
        <td><a href="/result/{{$result->id}}">{{$result->created_at}}</a></td>
    </tr>
    @endforeach
    @endif
</table>