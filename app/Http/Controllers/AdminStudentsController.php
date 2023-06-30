<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\HomeworkTask;
use App\Models\Skill;
use App\Models\Student;
use App\Models\Webpage;
use App\Models\Language;
use App\Models\Messenger;
use Illuminate\Http\Request;

class AdminStudentsController extends Controller
{
    public function showStudentForm() {

        return view('admin.studentsForm',['students'=>Student::all()]);
    }

    public function store(Request $request) {

    $studentData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'country' => 'required',
        'city' => 'required',
        'information' => 'required',
        'selectedTrainings' => 'required|string',
    ]);

    if(!$request->input('selectedTrainings') == null){

        $selectedTrainings = explode(',', $request->input('selectedTrainings'));

        $student = Student::create($studentData);

        $student->trainings()->attach($selectedTrainings);

        return redirect()->back()->with('success', 'Student created successfully.');

    }else {
        $student = Student::create($studentData);

    }

    return redirect()->back()->with('success', 'Student created successfully.');

    }

    public function showEditForm($student) {
        $studentData = Student::find($student);
        return view('admin.studentsForm', ['student' => $studentData]);
    }

    public function update(Request $request, $id) {


     $studentData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'country' => 'required',
        'city' => 'required',
        'information' => 'required',
        'selectedTrainings' => 'required|string',
    ]);

     $selectedTrainings = explode(',', $request->input('selectedTrainings'));

        $student = Student::findOrFail($id);

        $student->update($studentData);

        $student->trainings()->sync($selectedTrainings);

        return redirect()->route('student.table')->with('success', 'Student updated successfully.');
    }

    public function delete(Student $student) {

        $student->delete();
        return redirect()->route('student.table')->with('success', 'Student deleted successfully.');
    }

    public function deleteConfirmation(Student $student) {

        return view('utils.delete_confirmation', compact('student'));
    }


    public function showStudentSkill($id) {

        $student = Student::find($id);

        return view('admin.studentSkill',compact('student'));
     }

    public function showStudentTable() {

        return view('admin.studentsTable',['students'=>Student::all()]);
        }

    public function storeDetails(Request $request)
        {
        $request->validate([
        'skill' => 'required|array',
        'skill.*' => 'required',
        'hobby' => 'required|array',
        'hobby.*' => 'required',
        'messenger' => 'required',
        'url' => 'required|array',
        'url.*' => 'required',
        'name' => 'required|array',
        'name.*' => 'required',
        'language' => 'required|array',
        'language.*' => 'required',
        'score' => 'required|array',
        'score.*' => 'required',
        'student_id' => 'required',
        ]);
        $skills = $request->input('skill');
        $studentId = $request->input('student_id');
        foreach ($skills as $skill) {
            Skill::create([
                'skill' => $skill,
                'student_id' => $studentId,
            ]);
        }
        // $request->validate([
        //     'hobby' => 'required|array',
        //     'hobby.*' => 'required',
        //     'student_id' => 'required',
        // ]);
        $hobbies = $request->input('hobby');
        $studentId = $request->input('student_id');
        foreach ($hobbies as $hobby) {
            Hobby::create([
                'name' => $hobby,
                'student_id' => $studentId,
            ]);
        }
        // $request->validate([
        //     'messenger' => 'required',
        //     'student_id' => 'required',
        // ]);
            Messenger::create([
                'messenger' => $request->input('messenger'),
                'student_id' => $request->input('student_id'),
            ]);
        // $request->validate([
        //     'url' => 'required|array',
        //     'url.*' => 'required',
        //     'name' => 'required|array',
        //     'name.*' => 'required',
        //     'student_id' => 'required',
        // ]);
        $urls = $request->input('url');
        $names = $request->input('name');
        $studentId = $request->input('student_id');
        foreach ($urls as $index => $url) {
            Webpage::create([
                'url' => $url,
                'name' => $names[$index],
                'student_id' => $studentId,
            ]);
        }
        // $request->validate([
        //     'language' => 'required|array',
        //     'language.*' => 'required',
        //     'score' => 'required|array',
        //     'score.*' => 'required',
        //     'student_id' => 'required',
        // ]);
        $languages = $request->input('language');
        $scores = $request->input('score');
        $studentId = $request->input('student_id');
        foreach ($languages as $index => $language) {
            Language::create([
                'language' => $language,
                'score' => $scores[$index],
                'student_id' => $studentId,
            ]);
        }
        return redirect()->back()->with('success', 'Student created successfully.');
        }




}


