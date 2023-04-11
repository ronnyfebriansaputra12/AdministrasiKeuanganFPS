<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth.login.index');
    }

    public function register()
    {
        return view('auth.register.index');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'password_confirmation' => 'required|string|min:4|same:password',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_confirmation' => Hash::make($request->password_confirmation),

        ];

        User::create($data);

        Alert::toast('Registrasi Berhasil', 'success');
        return redirect('/');
        
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $cek = $request->only('email', 'password');
        if (Auth::attempt($cek)) {
            $request->session()->regenerate();
            Alert::toast('Login Berhasil', 'success');
            return redirect('/dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
