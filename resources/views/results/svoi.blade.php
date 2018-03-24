@extends('layouts.app')
@include('layouts.nav')
@section('content')
<div style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; height:100%;">
    <h2>Приказ на сите резултати што ги имате внесено</h2>
        <table class="table table-bordered" style="width:40%; margin-top:10px" >
            <tr style="background-color:#00a4a2; color:white">
            <th>Резултат</th>
            <th>Изврши промена</th>
            </tr>
            @foreach($rezultati as $result)
            <tr>
            <td><a href="/result/{{$result->id}}">{{$result->created_at->format('l/ jS /F h:i:s A')}}</a></td>
            <td><a href="/result_edit/{{$result->id}}">&nbspIzmeni</a></td>
            </tr>    
            @endforeach
      </table>
</div>
    @endsection