<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded = [
        'id'
    ];


    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function game()
    {
        return $this->hasMany(Game::class);
    }

    use HasFactory;
}
