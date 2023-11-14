<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Iluminate\View\View;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function show()
    {
        if(Auth::check())
        {
            return redirect()->route('auth.home');
        }
        return view('auth.register');
    }

    public function index()
    {
        return view('auth.index');
    }

    public function register(RegisterRequest $request)
    {       
        User::create($request->validated());
        return redirect()->route('auth.index')->with('success','Se creo correctamente');
     }
    
}
