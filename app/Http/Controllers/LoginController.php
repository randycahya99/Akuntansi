<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;

use App\User;
use Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login(Request $request)
    {     
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (!Auth::attempt($request->only('email','password'))) {
            return redirect()->back()->with('message','Login gagal, e-mail dan password tidak cocok.');
        } else {
            return redirect('/admin/dashboard');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
