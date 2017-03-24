<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Storage;

class Front extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('welcome',compact('product'));
    }
}
