<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ADD_EDIT extends Model
{
    protected $fillable = [
        'student_name',
        'student_lastname',
        'email',
        'phone',
        'country',
        'city',
        'language',
        'repository',
        'information',
    ];
}
