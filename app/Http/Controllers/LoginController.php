<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function show()
    {

        if(Auth::check())
        {
            return redirect()->route('auth.home');
        }

        return view('auth.login');
    }

    public function home()
    {
        return view('auth.home');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        // dd($credentials);
        //Auth funcion para validar credentials si es ! es false
        if(!Auth::validate($credentials))
        {
            return redirect()->route('auth.login')->withErrors('auth.failed');
        }

        //Buscar con estas funciones el usuario que tenga las misma password del usuario
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request,$user);
                 
    
    }

    public function authenticated(Request $request,$user)
    {
        return redirect()->route('auth.home');
    }


}
