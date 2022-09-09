<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            "products" => Product::latest()->take(8)->get(),
            "categories" => Category::latest()->take(4)->get()
        ]);
    }
    public function category()
    {
        return view('category')->with([
            "products" => Product::latest()->paginate(9),
            "categories" => Category::has("products")->get(),
        ]);
    }

    public function getProductByCategory(Category $category)
    {
        $products = $category->products()->paginate(9);
        return view('category')->with([
            "products" =>  $products,
            "categories" => Category::has("products")->get(),
        ]);
    }
    public function contact()
    {
        return view('contact');
    }
    public function createAccount()
    {
        return view("/auth/register");
    }
}
