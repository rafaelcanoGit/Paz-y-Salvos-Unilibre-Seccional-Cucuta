<?php

namespace sisPazySalvos\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;

use sisPazySalvos\Http\Controllers\Controller;
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
   


    protected function redirectTo(){

  if(Auth::check()){
      
    $user = Auth::user();
    if($user->rol=='Administrador'){
        return '/sispazysalvos/docente';
    }else if($user->rol=='Talento-Humano'){
        return '/talentohumano/pazysalvos';
    }else if($user->rol=='Caja'){
        return '/caja/docents';
    }else {
        return '/dependencia/pazysalvo'; }
    }
        return ('login');

}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

 
}
