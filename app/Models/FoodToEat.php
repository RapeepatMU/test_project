<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodToEat extends Model
{
    protected $table = 'food_to_eat';
    protected $fillable = [
        'name',

    ];
}
