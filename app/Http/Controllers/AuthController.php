<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
 
    public function registerPost(Request $request)
    {
        $user = new User();
 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
 
        $user->save();
        Alert::success('Register berhasil');
        return redirect('login');
    }
 
    public function login()
    {
        return view('auth.login');
    }
 
    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
 
        if (Auth::attempt($credetials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                Alert::success('Login berhasil');
                return redirect('/admin/dashboard');
            } elseif ($user->role == 'user') {
                return redirect('/login');
            }
        }
        Alert::error('Email atau Password salah!');
        return back();
    }
 
    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('welcome');
    }

    public function authenticated($user){
        if ($user->role == 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role == 'user') {
            return redirect('/home');
        }
    }
}
