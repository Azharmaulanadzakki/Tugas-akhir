<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name'      =>  'required|',
            'email'     => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'profile_image'     =>  'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'role'      =>  'required|',
        ]);

        // Periksa apakah peran yang diubah adalah sah
        $validRoles = ['admin', 'user'];
        if (!in_array($request->role, $validRoles)) {
            return redirect()->back()->with('error', 'Peran yang dimasukkan tidak valid.');
        }

        // Periksa apakah peran yang diubah sama dengan peran awal
        $user = User::find($id);
        if ($user->role === $request->role) {
            return redirect()->back()->with('warning', 'Peran tidak berubah.');
        }

        // Simpan perubahan peran ke database jika validasi melewati semua pemeriksaan
        $user->role = $request->role;
        $user->save();

        if ($request->hasFile('profile_image')) {
            // Jika pengguna mengunggah gambar profil baru, simpan gambar tersebut
            $profileImage = $request->file('profile_image');
            $imageName = time() . '.' . $profileImage->extension();
            $profileImage->storeAs('profile_images', $imageName, 'public');

            // Simpan nama gambar di dalam kolom 'profile_image' di tabel pengguna
            $user->profile_image = $imageName;
            $user->save();
        }

        return redirect()->route('user.index')->with(['success' => "Data Berhasil di Update!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
