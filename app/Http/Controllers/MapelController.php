<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapels = Mapel::latest()->paginate(5);
        return view('admin.mapel.index', compact('mapels'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     =>  'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul'     =>  'required|',
            'harga'     =>  'required|',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/mapels', $image->hashName());

        //create post
        Mapel::create([
            'image'     => $image->hashName(),
            'judul'     => $request->judul,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('mapel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        return view('admin.mapel.edit', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        $this->validate($request, [
            'image'     =>  'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'judul'     =>  'required|',
            'harga'     =>  'required|',
        ]);

        //untuk menyimpan gambar yang ada
        $existingImage = $mapel->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/mapels', $image->hashName());

            //hapus gambar lama
            if ($existingImage) {
                Storage::delete('public/mapels/' . $existingImage);
            }

            $mapel->update([
                'image'     => $image->hashName(),
                'judul'     => $request->judul,
                'harga'     => $request->harga,
            ]);
        } else {
            $mapel->update([
                'judul'     => $request->judul,
                'harga'     => $request->harga,
                'image'  => $existingImage //gunakan gambar yang sudah ada
            ]);
        }

        return redirect()->route('mapel.index')->with(['success' => "Data Berhasil di Update!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        Storage::delete('public/mapels/', $mapel->image);
        $mapel->delete();
        return redirect()->route('mapel.index')-> with(['successsss' => 'Data sudah dihapus']);
    }
}
