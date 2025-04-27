<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StressResult extends Model
{
    protected $fillable = [
        'user_id',
        'acute',
        'chronic',
        'emotional',
        'physical',
        'main_type'
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function typeStress()
    {
        // Recherche le type de stress en fonction du champ `main_type`
        return $this->hasOne(Type_stress::class, 'name', 'main_type');
    }
    
    

}
