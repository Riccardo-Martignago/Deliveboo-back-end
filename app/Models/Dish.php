<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable =[
        'user_id',
        'name',
        'photo',
        'description',
        'price',
        'visible'
    ];

    public function users(){
        return $this->belongsTo(User::class , 'user_id')
        ->withPivot('quantity');
    }
    public function dishes()
    {
        return $this->belongsToMany(Order::class, 'order_dishes', 'dish_id', 'order_id');
    }
}
