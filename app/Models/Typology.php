<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    use HasFactory;

    protected $fillable =[
        'name'
    ];

        public function users()
        {
            return $this->belongsToMany(User::class, 'restourant_typologies', 'typology_id', 'user_id');
        }
        public function restaurants()
        {
            return $this->belongsToMany(User::class, 'restourant_typologies', 'typology_id', 'user_id');
        }
}
