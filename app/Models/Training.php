<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_title',
        'description',
        'start_date',
        'end_date',
        'estimate',
    ];

    // public function modules()
    // {
    //     return $this->hasMany(Module::class, 'training_id');
    // }
}
