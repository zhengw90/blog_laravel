@extends('layouts.layout')
@section('title')
	{{$product->title}}
@stop

@section('body')
	{!! Form::open([
		'method'=>'delete',
		'route'=>['product.destroy', $product->id]
	])!!}
	<h1>{{$product->title}}</h1>
		<h2>{{$product->slug}}</h2>
			<h3>{{$product->text}}</h3>

	<a href="{{route('product.edit', $product->id )}}">Edit</a>
	{!!Form::submit('Delete')!!}
	{!!Form::close()!!}
	
@stop
