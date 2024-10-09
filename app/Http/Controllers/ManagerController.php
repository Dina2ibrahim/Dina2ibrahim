<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
   
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

   
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('home'); 
        } else {
           
            return redirect()->back()->withErrors(['email' => 'بيانات الدخول غير صحيحة']);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); 
    }
}