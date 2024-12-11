<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showSignin()
    {
        return view('signin');
    }

    public function signin(Request $request)
    {
        $credentials = $request->only(['username', 'password']);
        
        if ($credentials['username'] == 'admin' && $credentials['password'] == 'password') {
            $userData = [
                'username' => $credentials['username'],
                'is_login' => true
            ];
            
            session()->put('user', $userData);
            
            return redirect('/profile')->with('success', 'Login berhasil');
        }
        
        return back()->with('error', 'Login gagal');
    }

    public function showSignup()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $data = $request->all();
        
        session()->put('registered_user', $data);
        
        return redirect('/signin')->with('success', 'Registrasi berhasil');
    }

    public function profile()
    {
        return view('profile');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/signin');
    }
}
