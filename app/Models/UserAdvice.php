<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAdvice extends Model
{
    protected $table = 'user_advices';

    protected $fillable = [
        'user_id',
        'advice_id',
        'is_completed',
    ];
    public function advice()
    {
        return $this->belongsTo(Advice::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
