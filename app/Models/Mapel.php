<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
