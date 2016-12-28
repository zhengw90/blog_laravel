@extends('layouts.layout')
@section('title')
	Edit {{$product->title}}
@stop

@section('body')
	{!! Form::model($product, [
		'method'=>'patch',
		'route'=>['product.update', $product->id]
	])!!}

	{!! Form::label('title', 'Title') !!}
	{!! Form::text('title', $product->title, ['placeholder' => 'Give a Title']) !!}
	
	<br>
	
	{!! Form::label('slug', 'Slug') !!}
	{!! Form::text('slug', $product->slug, ['placeholder' =>"Give a slug"] ) !!}
	<br>
	{!! Form::label('text', 'Text') !!}
	{!! Form::text('text', $product->text, ['placeholder' =>"Give a text"] ) !!}

	{!!Form::submit('Edit')!!}
	{!!Form::close()!!}
	
@stop
