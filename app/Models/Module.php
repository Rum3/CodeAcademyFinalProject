<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    protected $fillable = ['module_title', 'description'];
    public function lectures()
    {
        return $this->hasMany(Lecture::class, 'module_id');
    }
}
