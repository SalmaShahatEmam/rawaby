<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('site.products', compact('products'));
    }

    public function show($slug){
        $product = Product::where('slug',$slug)->first();
        $products = Product::where('id', '!=', $product->id)->take(3)->get();

        return view('site.product',compact('product','products'));
    }
}
