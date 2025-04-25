<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Positivity extends Model
{
    protected $fillable = [
        'positive_thing_1',
        'positive_thing_2',
        'positive_thing_3',
        'user_id',
        'exercise_id',
    ];
}
