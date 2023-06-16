<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGradue extends Model
{
    protected $table;

    protected $fillable = [
        'student_dairy',
        'score',
        'homework',
        'absence',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable('project'); // Тук указвате първата таблица
    }

    // Други свойства и методи на модела

    public function switchToGradueTable()
    {
        $this->setTable('gradues'); // Тук указвате втората таблица
    }
}
