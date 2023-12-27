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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed', // Gunakan 'confirmed' untuk memastikan ada konfirmasi password
        ], [
            'password.confirmed' => 'Konfirmasi password tidak cocok!',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        // Menampilkan pesan SweetAlert untuk keberhasilan
        Alert::success('Pendaftaran Berhasil', 'Selamat! Anda berhasil terdaftar.');

        return redirect('login');
    }



    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                Alert::success('Login berhasil');
                return redirect('/admin/dashboard');
            } elseif ($user->role == 'user') {
                return redirect('/login');
            }
        }
        Alert::error('Email atau Password salah!');
        return back()->withInput();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function authenticated($user)
    {
        if ($user->role == 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role == 'user') {
            return redirect('/home');
        }
    }
}
