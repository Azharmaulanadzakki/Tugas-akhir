<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $mapels = DB::table('mapels')
            ->when($search, function ($query) use ($search) {
                return $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(5);

        return view('admin.mapel.index', compact('mapels', 'search'));
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
            'image'         =>  'required|image|mimes:jpeg,jpg,png|max:10000',
            'judul'         =>  'required|',
            'description'   =>  'required|',
            'harga'         =>  'required|',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/mapels', $image->hashName());

        //create post
        Mapel::create([
            'image'         => $image->hashName(),
            'judul'         => $request->judul,
            'description'   => $request->description,
            'harga'         => $request->harga,
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
            'image'           =>  'nullable|',
            'judul'           =>  'required|',
            'description'     =>  'required|',
            'harga'           =>  'required|',
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
                'judul'         => $request->judul,
                'description'   => $request->description,
                'harga'         => $request->harga,
                'image'         => $image->hashName(),
            ]);
        } else {
            $mapel->update([
                'judul'         => $request->judul,
                'description'   => $request->description,
                'harga'         => $request->harga,
                'image'         => $existingImage //gunakan gambar yang sudah ada
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
        Alert::success("Berhasil dihapus");
        return redirect()->route('mapel.index');
    }
}
