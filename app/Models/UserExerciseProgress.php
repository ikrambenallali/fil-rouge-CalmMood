<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExerciseProgress extends Model
{
    protected $fillable = [
        'user_id',
        'exercice_id',
        'advice_id',
        'is_completed',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercice()
    {
        return $this->belongsTo(Exercice::class);
    }
}
