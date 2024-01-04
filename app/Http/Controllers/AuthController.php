<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{

    public function profile()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login

        return view('auth.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('auth.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // add other validation rules as needed
    ]);

    $userData = [
        'name' => $request->name,
        'email' => $request->email,
        // add other profile fields
    ];

    // Update data
    $user->update($userData);

    // Update profile image if uploaded
    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
    
        // Store the image in the storage/app/public/profile_images directory
        Storage::putFileAs('public/profile_images', $image, $imageName);
    
        // Delete old image if it exists
        if ($user->profile_image) {
            // Use Storage::delete to remove the old image from the storage
            Storage::delete('public/profile_images/'.$user->profile_image);
        }
    
        // Save image file name to the database
        $user->update(['profile_image' => $imageName]);
    }

    // Show SweetAlert success message
    Alert::success('Profile Updated', 'Your profile has been successfully updated.');

    return redirect()->route('profile');
    }
    

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
