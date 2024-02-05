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

        // Ambil data materi yang terkait dengan $parent_id yang dipilih dengan paginasi
        $materis = DB::table('materis')
            ->where('parent_id', $parent_id)
            ->paginate(1); // Sesuaikan dengan jumlah item per halaman yang diinginkan

        //buat playlist
        $playlists = DB::table('materis')
            ->where('parent_id', $parent_id)
            ->get();

        $parent_id = $parent_id;

        // Kirimkan variabel $parent dan $materis ke tampilan
        return view('materi', compact('parent', 'materis', 'playlists', 'parent_id'));
    }

    public function tools($parent_id = null)
    {
        // Ambil data parent dari tabel mapels sesuai dengan $parent_id
        $parent = $parent_id ? DB::table('mapels')->find($parent_id) : null;

        // Jika $parent tidak ditemukan, bisa ditangani di sini
        if (!$parent && $parent_id) {
            abort(404); // atau atur sesuai kebutuhan aplikasi Anda
        }

        // Ambil data tools yang terkait dengan $parent_id (jika diberikan) atau semua tools
        $toolsQuery = DB::table('tools');

        if ($parent_id) {
            $toolsQuery->where('mapel_id', $parent_id);
        }

        $tools = $toolsQuery->get();

        // Kirimkan variabel $parent, $tools, dan $parent_id ke tampilan
        return view('tools', compact('parent', 'tools', 'parent_id'));
    }
}
