<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [
        'id'
    ];

    public function rating()
    {
        return $this->belongsTo(Rating::class, 'id_game');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function kategori()
    {
        return $this->hasMany(Kategori::class);
    }

    use HasFactory;
}
