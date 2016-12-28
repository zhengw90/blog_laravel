<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	
    	return view('products.index')->with('products', $products); 
	
    }
    
    
    public function create()
    {
    	    	 
    	return view('products.create');
    
    }
    
    public function store(Request $request)
    {
    	/*
    	 $product = new Product();
    	 $product->slug = $request->slug;
    	 $product->title = $request->title;
    	 $product->text = $request->text;
    	 $product->save();
    	 */
    		
    	$input = $request->all();
    	$product = Product::Create($input);
    		
    	return redirect()->route('product.index');
    }
    
    public function show($id)
    {
    	$product = product::find($id);
    
    	return view('products.show')->with('product', $product);
    }

    public function destroy($id)
    {
    	product::destroy($id); 
    	
    	return redirect()->route('product.index');
    }
    
    public function update(Request $request, $id)
    {
    	$product = Product::find($id);
    	
    	$product->title = $request->title;
    	$product->slug =$request->slug;
    	$product->text = $request->text;    	
    	$product->save();
    	
    	return redirect()->route('product.index');
    	
    }
    
    public function edit($id)
    {
    	$product = Product::find($id);
    	 	 
    	return view('products.edit')->with('product', $product);
    	 
    }
       
    
}
