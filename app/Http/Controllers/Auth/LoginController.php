<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    /**
    * Get the post register / login redirect path.
    *
    * @return string
    */
    public function redirectPath()
    {    
        return '/home';
        // if (Auth::user()->role_id == 2) {
        //     return '/home';
        // }
        // elseif(Auth::user()->role_id == 0) {
        //     return '/home';
        // }
        // elseif(Auth::user()->role_id == 1) {
        //     return '/home';
        // }
    }
}
