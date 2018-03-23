<table>
    <tr>
        <th>
            Назив на институција
        </th>
    </tr>
    @foreach($institutions as $institution)
    <tr>
        <td>{{$institution->name}}</td>
    </tr>
    @endforeach
</table>