@extends('layouts.app')
@include('layouts.nav')
<head >
    <title>Line Chart</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
</head>
<div style="width:75%;margin-top:100px;">
    {!! $chartjs->render() !!}
</div>
