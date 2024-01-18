<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Package;
use App\Models\Langganan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $langganans = Langganan::with('user', 'package')->latest()->paginate(5);
        return view('admin.langganan.index', compact('langganans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::with('langganan')->get();
        $packages = Package::with('langganan')->get();
        return view('admin.langganan.create', compact('users', 'packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id'     =>  'required|exists:users,id',
            'package_id'  =>  'required|exists:packages,id',
            'start_date'  =>  'required',
        ]);

        $package = Package::findOrFail($request->input('package_id'));

        $end_date = Carbon::parse($request->start_date)->addMonths($package->durasi);

        Langganan::create([
            'user_id'    => $request->input('user_id'),
            'package_id' => $request->input('package_id'),
            'start_date' => $request->start_date,
            'end_date'   => $end_date,
        ]);

        return redirect()->route('subscription.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Langganan $langganan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Langganan $langganan)
    {
        $users = User::with('langganan')->get();
        $packages = Package::with('langganan')->get();
        return view('admin.langganan.edit', compact('users', 'packages', 'langganan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Langganan $langganan)
    {
        $this->validate($request, [
            'user_id'     =>  'required|exists:users,id',
            'package_id'  =>  'required|exists:packages,id',
            'start_date'  =>  'required',
        ]);

        $package = Package::findOrFail($request->input('package_id'));

        $end_date = Carbon::parse($request->start_date)->addMonths($package->durasi);

        $langganan->update([
            'user_id'    => $request->input('user_id'),
            'package_id' => $request->input('package_id'),
            'start_date' => $request->start_date,
            'end_date'   => $end_date,
        ]);

        if ($request->input('user_id')) {
            $activeParent = User::find($request->input('user_id'));
            $activeParent->update(['active' => true]);
        }
        if ($request->input('package_id')) {
            $activeParent = User::find($request->input('package_id'));
            $activeParent->update(['active' => true]);
        }

        return redirect()->route('langganan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Langganan $langganan)
    {
        $langganan->delete(); //delete subscription
        return redirect()->route('langganan.index')->with(['success' => 'Data Berhasil di Delete']);
    }
}