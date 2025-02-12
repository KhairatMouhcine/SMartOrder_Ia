<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('site');

    }

    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required' 
        ]);

        if(Auth::attempt($attributes))
        {
            session()->regenerate();
            if(Auth::user()->role == "admin"){
                return redirect('/dashboard')->with(['success'=>'You are logged in.']);
            }
            if(Auth::user()->role == "client"){
                return redirect('/')->with(['success'=>'You are logged in.']);
            }
        }
        else{

            return back()->withErrors(['email'=>'Email or password invalid.']);
        }
    }
    
    public function destroy()
    {

        Auth::logout();

        return redirect('/')->with(['success'=>'You\'ve been logged out.']);
    }
}
