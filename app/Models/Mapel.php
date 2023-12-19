<?php

namespace App\Models;

use App\Models\Tool;
use App\Models\Materi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
