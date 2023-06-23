<?php

// StudentController.php
namespace App\Http\Controllers;


use App\Models\Student;

class StudentsController extends Controller
{

    public function showOverallProgress() {


        return view('student.progress',['students'=>Student::all()]);
    }

    public function showGrades() {


        return view('student.grades',['students'=>Student::all()]);
    }

    public function showTrainings() {


        return view('student.trainings',['students'=>Student::all()]);
    }

}

