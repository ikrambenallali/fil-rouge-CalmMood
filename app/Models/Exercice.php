<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'duration',
        'video_url',
        'animation_script',
        'audio_url',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
