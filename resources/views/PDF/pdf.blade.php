<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Резултати од лабораторија</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1>
    <center>
        Rezultati od laboratorija
    </center>
</h1>
	<table class="table">
        <tr>
        <th scope="col">Ime i prezime na pacientot:</th>
        <th scope="col">Ime i prezime na maticniot lekar:</th>
            <th scope="col">Data</th>
            <th scope="col">City</th>
            <th scope="col">Institucija</th>
    </tr>
    <tr>
        <td>{{$pacient->first_name}} {{$pacient->last_name}}</td>
        <td>{{$maticen->first_name}} {{$maticen->last_name}}</td>
        <td>{{$date->format('l/ jS /F h:i:s A')}}</td>
        <td>{{$laboratorija->city}}</td>
        <td>{{$laboratorija->institucija}}</td>
    </tr>
		<tr>
			<th scope="col">Stavka</th>
			<th scope="col">Vrednost</th>
            <th scope="col">Merka</th>
            <th scope="col">Granici</th>
		</tr>
		@foreach($items as $item)
			<tr>
            <td>{{$item->item_name}}</td>
			<td>{{$item->value}}</td>
            <td>{{$item->measure}}</td>
            <td>{{$item->min}}-{{$item->max}}</td>
            </tr>
		@endforeach
	</table>

</body>
    </html>