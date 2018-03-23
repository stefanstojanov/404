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