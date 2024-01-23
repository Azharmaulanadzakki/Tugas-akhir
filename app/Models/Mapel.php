<?php

namespace App\Models;

use App\Models\Tool;
use App\Models\Materi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Pembayaran;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'description',
        'image',
        'harga',
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'parent_id');
    }

    public function tool()
    {
        return $this->hasMany(Tool::class, 'parent_id');
    }


    public function deleteMapel()
    {
        $mapel = Mapel::find(1);
        $mapel->delete();

        // Tambahkan logika atau respons sesuai kebutuhan
    }

    //pembayaran
    // public function pembayaran()
    // {
    //     return $this->hasMany(Pembayaran::class);
    // }

    // // Metode lain yang mungkin diperlukan
    // public function getFormattedHargaAttribute()
    // {
    //     // Mengembalikan harga dalam format yang diinginkan
    //     return 'Rp ' . number_format($this->harga, 2, ',', '.');
    // }
}
