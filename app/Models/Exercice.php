<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'video_url',
        'respiration_data',
        'typeStressId',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getYoutubeId($url)
    {
        preg_match('/(youtu\.be\/|watch\?v=|embed\/)([^\?&"\'<>]+)/', $url, $matches);
        return $matches[2] ?? null;
    }
    public function typeStress()
    {
        return $this->belongsTo(Type_stress::class, 'typeStressID', 'id');
    }
   
}
