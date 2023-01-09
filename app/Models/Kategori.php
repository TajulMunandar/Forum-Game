<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $guarded = [
        'id'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'id_kategori');
    }

    use HasFactory;
}
