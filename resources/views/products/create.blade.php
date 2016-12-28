@extends('layouts.layout')
@section('title')
	Create a new Product
@stop

@section('body')
	{!! Form::open(['route' => 'product.store']) !!}
	
	{!! Form::label('title', 'Title') !!}
	{!! Form::text('title', null, ['placeholder' => 'Give a Title']) !!}
	
	<br>
	
	{!! Form::label('slug', 'Slug') !!}
	{!! Form::text('slug', null, ['placeholder' =>"Give a slug"] ) !!}
	
	{!! Form::label('text', 'Text') !!}
	{!! Form::text('text', null, ['placeholder' =>"Give a text"] ) !!}

	{!! Form::submit('Create') !!}
	
	{!! Form::close() !!}
@stop