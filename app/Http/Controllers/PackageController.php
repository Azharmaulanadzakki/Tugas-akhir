<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $packages = Package::when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%');
        })
            ->latest()
            ->paginate(5);

        return view('admin.package.index', compact('packages', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama' => 'required',
            'description' => 'required',
            'harga' => 'required',
            'durasi' => 'required',
        ]);

        Package::create([
            'nama'    => $request->nama,
            'description'    => $request->description,
            'harga'    => $request->harga,
            'durasi'    => $request->durasi,
        ]);

        // redirect to index
        return redirect()->route('package.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('admin.package.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        $this->validate($request, [
            'nama' => 'required',
            'description' => 'required',
            'harga' => 'required',
            'durasi' => 'required',
        ]);

        $package->update([
            'nama'    => $request->nama,
            'description'    => $request->description,
            'harga'    => $request->harga,
            'durasi'    => $request->durasi,
        ]);

        return redirect()->route('package.index')->with(['success' => "Data Berhasil di Update!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete(); //delete package
        return redirect()->route('package.index')->with(['success' => 'Data Berhasil di Delete']);
    }
}
