<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    public function index()
    {      
    	//this objectis just to fetch category and products in the product form
        $categories = Category::all(); 
        $products = Product::all(); 
        return view('welcome', compact(['categories','products']));
    }
}
