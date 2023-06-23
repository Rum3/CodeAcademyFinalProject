<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_name',
        'student_lastname',
        'email',
        'phone',
        'country',
        'city',
        'language',
        'languageScore',
        'repository',
        'information',
    ];
}
