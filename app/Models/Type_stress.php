<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_stress extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'content'];
    protected $table = 'type_stress';

}
