<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function checkout(){
        $user = Auth::user();
        return view("checkout")->with([
            "items" => Cart::getContent(),
            "user" =>$user
        ]);
    }
}
