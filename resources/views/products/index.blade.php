@extends('layouts.layout')
@section('title') 
	All Products
@stop

@section('body')
	@foreach($products as $product)
		<h1>{{$product->id}}</h1>
		<h1>{{$product->title}}</h1>
	@endforeach
@stop
