<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id',
    ];
    protected $table = 'advices';
}
