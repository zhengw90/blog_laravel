@extends('layouts.layout')

@section('title')
	Contact
@stop


@section('body')
	<h1> This is the Contact Page. </h1>	 
	{!! Form::text('price', '50$' , ['class' => "form-control",'placeholder' => 'Give a price' ]) !!}
	{!! Form::text('price') !!}
	{!! Form::number('level', 10)	!!}
@stop