<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated(Request $request, $user){
        if(!$user->active){
            Auth::logout();
            return redirect("/login")
            ->with(['errorLink' => 'Veuillez activer votre compte 
            <a href="'.route('code.resend',$user->email).'">
            Renvoyer le lien d\'activation
            </a> 
            '])->withEmail($user->email);
        }
    }
    protected function logout(){
           \Cart::clear();
            Auth::logout();
            return redirect("/");
    }
    protected function log(){
        return view("/auth/login");
}
}
