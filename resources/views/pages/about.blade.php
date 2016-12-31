@extends('layouts.layout')

@section('title')
	about
@stop


@section('body')


	<h1>This is about page</h1>
	<p> {{$name1}} </p>
	
	@if($isUserRegistered == true) 
		Hello Mate
	@else 
		Please register!
	@endif
	
	@for ($i = 0; $i<10; $i++)
    	<p>The current value is {{ $i }} </p>
	@endfor
	
	@foreach($users as $data) 
		<p>{{$data}}</p>
	@endforeach
	 
@stop
