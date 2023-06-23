<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Student;
use App\Models\Training;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function index(){
    //     return view('adminView');
    // }

    public function showAdminDash(){
        return view('admin.dashboard');
    }

    public function showUsers(){
        $users = User::all();
        return view('admin.users', ['users'=>$users]);
    }

    public function showEditForm($id){
        $user = User::findOrFail($id);

        return view('admin.edit.user', ['user' => $user]);
    }

    public function updateUser(Request $request, $id){

        $user = User::findOrFail($id);


        $user->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'role'=>$request->input('role'),
        ]);

        // dd($request);

        return redirect()->route('users.table')->with('message' , "The user is updated succesfully!");
    }

    public function deleteUser($id){
        // $users = User::all();
        $user = User::find($id);

        // dd($id);

        $user->delete();

        return redirect()->route('users.table')->with('message' , "The user is removed succesfully!");
    }

    public function showPages(){
        return view('admin.pages');
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return redirect()->back()->with('success', 'student created successfully.');
    }

    public function studentDestroy(Student $student)
        {
            $student->delete();
            return redirect()->route('student.table')->with('success', 'Student deleted successfully.');
        }

        public function deleteConfirmation(Student $student)
        {
            return view('utils.delete_confirmation', compact('student'));
        }

        public function showEditFormWithData($student)
        {
            $studentData = Student::find($student);
            return view('admin.studentsForm', ['student' => $studentData]);
        }

        public function studentUpdate(Request $request, Student $student)
        {
            // Retrieve the updated student data from the request
            $updatedData = $request->validate([
                'student_name'=> 'required',
                'student_lastname'=> 'required',
                'email'=> 'required',
                'phone'=> 'required',
                'country'=> 'required',
                'city'=> 'required',
                'language'=> 'required',
                'languageScore'=> 'required',
                'repository'=> 'required',
                'information'=> 'required',
            ]);
            // Update the student's attributes
            $student->update($updatedData);
            // Redirect back or to a specific route
            return redirect()->route('student.table')->with('success', 'Student updated successfully.');
        }


    public function showStudentForm()
{

    return view('admin.studentsForm',['students'=>Student::all()]);
}

    public function showStudentTable()
{

    return view('admin.studentsTable',['students'=>Student::all()]);
}

public function showTrainingTable() {

    return view('admin.trainingTable');
}

public function showTrainingForm() {

    return view('admin.trainingForm');
}

public function storeTraining(Request $request)
    {
        // Валидация на входните данни
        $request->validate([
            'title' => 'required',
            'training_description' => 'required',
            'module_title' => 'required',
            'module_description' => 'required',
            'lecture_title' => 'required',
            'lecture_description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'estimate' => 'nullable|integer',
        ]);
        // Създаване на запис в таблицата "title"
        Training::create([
            'training_title' => $request->input('title'),
            'description' => $request->input('training_description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'estimate' => $request->input('estimate'),
        ]);




        $validatedData = $request->validate([
        'module_title.*' => 'required',
        'module_description.*' => 'required',
        ]);

        foreach ($validatedData['module_title'] as $index => $title) {
        $module = new Module;
        $module->module_title = $title;
        $module->description = $validatedData['module_description'][$index];
        $module->save();
    }
    return redirect()->back()->with('success', 'Операцията беше успешна!');
}

public function destroyTraining(Training $training)
        {
            $training->delete();
            return redirect()->back()->with('success', 'You delete the training');
        }

public function showGradesForm()
        {
            return view('admin.gradesForm');
        }


}
