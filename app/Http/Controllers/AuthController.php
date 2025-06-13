<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerview(){
        return view('registration');
    }
    public function register(RegistrationRequest $request)
    {
        $validated = $request->validated();
        User::create($validated);
        return redirect('/login');
    }

      public function loginview(){
        return view('login');
    }

    public function login(LoginRequest $request){
        $validated = $request->validated();
        //  dd($validated);
        if(Auth::attempt($validated)){
           
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors(['email'=> 'The email or mobile number you entered isn’t connected to an account. Please try again']);
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->flush();
        return redirect('/login');
    }
    
}