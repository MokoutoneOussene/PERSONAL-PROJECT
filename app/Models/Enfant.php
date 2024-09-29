<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function Agent() {
        return $this->belongsTo(Personnel::class, 'personnels_id');
    }
}
