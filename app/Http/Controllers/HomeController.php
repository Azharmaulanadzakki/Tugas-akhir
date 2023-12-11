<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $mapels = DB::table('mapels')
            ->when($search, function ($query) use ($search) {
                return $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate();

        return view('home', compact('mapels', 'search'));
    }

    public function materi(Request $request, $parent_id)
    {
        // Ambil data parent dari tabel mapels sesuai dengan $parent_id
        $parent = DB::table('mapels')->find($parent_id);

        // Jika $parent tidak ditemukan, bisa ditangani di sini
        if (!$parent) {
            abort(404); // atau atur sesuai kebutuhan aplikasi Anda
        }

        // Ambil data materi yang terkait dengan $parent_id yang dipilih
        $materis = DB::table('materis')
            ->where('parent_id', $parent_id)
            ->get();


        // Kirimkan variabel $parent dan $materis ke tampilan
        return view('materi', compact('parent', 'materis'));
    }
}
