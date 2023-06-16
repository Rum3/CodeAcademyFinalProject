<?php

// StudentController.php
namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\File;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\ProjectGradue;

class StudentsController extends Controller
{

    public function StudentsForm()
    {
        $students = Student::all();
        $tasks = Lecture::all();
        $projects = ProjectGradue::all();
        $gradues = ProjectGradue::all();
        return view('Admin.StudentsForm', compact('students', 'tasks', 'projects', 'gradues'));
    }
    public function java()
    {
        $students = Student::all();
        $tasks = Lecture::all();
        $projects = ProjectGradue::all();
        $gradues = ProjectGradue::all();

        return view('trainings.java', compact('students', 'tasks', 'projects', 'gradues'));
    }

    public function overallPerformance()
    {
        $students = Student::all();
        $tasks = Lecture::all();
        $projects = ProjectGradue::all();
        $gradues = ProjectGradue::all();

        return view('trainings.overallPerformance', compact('students', 'tasks', 'projects', 'gradues'));
    }

    public function grades()
    {
        $students = Student::all();
        $tasks = Lecture::all();
        $projects = ProjectGradue::all();
        $gradues = ProjectGradue::all();

        return view('trainings.grades', compact('students', 'tasks', 'projects', 'gradues'));
    }

    public function training()
    {
        $students = Student::all();
        $tasks = Lecture::all();
        $projects = ProjectGradue::all();
        $gradues = ProjectGradue::all();

        return view('trainings.training', compact('students', 'tasks', 'projects', 'gradues'));
    }

    public function downloadResume($id)
{
    $student = Student::find($id);

    if ($student) {
        $file = new File();
        $file->name = $student->name;
        $file->path = $student->resumeLink;
        $file->save();

        return response()->download(public_path($student->resumeLink));
    }

    return back()->with('error', 'File not found.');
}

public function redirectToView()
{

    return view('Admin.add_editUsers');
}



}

