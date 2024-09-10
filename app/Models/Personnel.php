<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $guarded = [

    ];

    function Contrat() {
        return $this->hasOne(Contrat::class);
    }

    public function missions()
    {
        return $this->belongsToMany(Mission::class, 'mission_personnel')
            ->withPivot('role', 'task')
            ->withTimestamps();
    }
}
