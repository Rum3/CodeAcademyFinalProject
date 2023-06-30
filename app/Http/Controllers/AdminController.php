<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Hobby;
use App\Models\Skill;
use App\Models\Module;
use App\Models\Lecture;
use App\Models\Student;
use App\Models\Webpage;
use App\Models\Homework;
use App\Models\Language;
use App\Models\Training;
use App\Models\Messenger;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function showAdminDash(){
        return view('admin.dashboard');
    }

    public function showUsers(){
        $users = User::paginate(5);
        return view('admin.users', ['users'=>$users]);
    }

    public function showEditForm($id){
        $user = User::findOrFail($id);

        return view('admin.edit', ['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('users.table')->with('message', "The user is updated successfully!");
    }

    public function deleteUser($id){
        // $users = User::all();
        $user = User::findOrFail($id);

        // dd($id);

        $user->delete();

        return redirect()->route('users.table')->with('message' , "The user is removed succesfully!");
    }

    public function showPages(){
        return view('admin.pages');
    }

// public function store(Request $request)
// {

//     $studentData = $request->validate([
//         'first_name' => 'required',
//         'last_name' => 'required',
//         'email' => 'required|email',
//         'phone' => 'required',
//         'country' => 'required',
//         'city' => 'required',
//         'information' => 'required',
//         'selectedTrainings' => 'required|string',
//     ]);

//     $selectedTrainings = explode(',', $request->input('selectedTrainings'));

//     $student = Student::create($studentData);

//     $student->trainings()->attach($selectedTrainings);

//     return redirect()->back()->with('success', 'Student created successfully.');
// }




        // public function studentUpdate(Request $request, $id)
        // {
        //     $studentData = $request->validate([
        //         'first_name' => 'required',
        //         'last_name' => 'required',
        //         'email' => 'required|email',
        //         'phone' => 'required',
        //         'country' => 'required',
        //         'city' => 'required',
        //         'repository' => 'required',
        //         'information' => 'required',
        //         'selectedTrainings' => 'required|string',
        //     ]);

        //     $selectedTrainings = explode(',', $request->input('selectedTrainings'));

        //     $student = Student::findOrFail($id);

        //     $student->update($studentData);

        //     $student->trainings()->sync($selectedTrainings);

        //     return redirect()->route('student.table')->with('success', 'Student updated successfully.');
        // }



    // public function showTrainingTable() {
    //     return view('admin.trainingTable');
    // }
    // public function showTrainingForm() {
    //     return view('admin.trainingForm');
    // }
    // public function storeTraining(Request $request)
    //     {
    //         // Валидация на входните данни
    //         $request->validate([
    //             'title' => 'required',
    //             'description' => 'required',
    //             'start_date' => 'required|date',
    //             'end_date' => 'required|date',
    //             'estimate' => 'nullable|integer',
    //         ]);
    //         // Създаване на запис в таблицата "title"
    //         Training::create([
    //             'title' => $request->input('title'),
    //             'description' => $request->input('description'),
    //             'start_date' => $request->input('start_date'),
    //             'end_date' => $request->input('end_date'),
    //             'estimate' => $request->input('estimate'),
    //         ]);
    //     return redirect()->back()->with('success', 'Операцията беше успешна!');
    //     }

    // public function destroyTraining(Training $training)
    //         {
    //             $training->delete();
    //             return redirect()->back()->with('success', 'You delete the training');
    //         }
    public function showGradesForm()
            {
                return view('admin.gradesForm');
            }
    //  public function showModule($id)
    // {
    //     $training = Training::find($id);
    //     return view('admin.module', compact('training'));
    // }
    // public function showModuleTable($id)
    // {
    //     $training = Training::find($id);
    //     $modules = Module::all();
    //     return view('admin.moduleTable', compact('training' , 'modules'));
    // }
    // public function moduleEdit($module, $id)
    // {
    //     $training = Training::find($id);
    //     $moduleData = Module::find($module);
    //     return view('admin.module', ['module' => $moduleData, 'training' => $training]);
    // }
    // public function storeModule(Request $request, int $id)
    // {
    //     $training = Training::find($id);
    //     // Валидация на данните от формата, ако е необходимо
    //         $request->validate([
    //         'module_title.*' => 'required|string',
    //         'description.*' => 'required|string',
    //     ]);
    //     // Взимане на модулните данни от формата и записване в базата данни
    //     $moduleTitles = $request->input('module_title');
    //     $description = $request->input('description');
    //     foreach ($moduleTitles as $index => $title) {
    //         $module = new Module();
    //         $module->title = $title;
    //         $module->description = $description[$index];
    //         $module->training_id = $training->id;
    //         $module->save();
    //     }
    //     return redirect()->back()->with('success', 'Операцията беше успешна!');
    // }
    // public function showLecture($id)
    // {
    //     $training = Training::find($id);
    //     $modules = Module::all();
    //     return view('admin.lecture', compact('training' , 'modules'));
    // }
    // public function lectureStore(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'lecture_title.*' => 'required',
    //         'lecture_description.*' => 'required',
    //         'lecture_date.*' => 'required',
    //         'module_id' => 'required',
    //     ]);
    //     $lectureTitles = $request->input('lecture_title');
    //     $lectureDescriptions = $request->input('lecture_description');
    //     $lectureDates = $request->input('lecture_date');
    //     $moduleId = $request->input('module_id');
    //     $lectures = [];
    //     foreach ($lectureTitles as $index => $lectureTitle) {
    //         $lecture = new Lecture();
    //         $lecture->title = $lectureTitle;
    //         $lecture->description = $lectureDescriptions[$index];
    //         $lecture->date = $lectureDates[$index];
    //         $lecture->module_id = $moduleId;
    //         $lecture->save();
    //         $lectures[] = $lecture;
    //     }
    //     return redirect()->back()->with('success', 'Лекциите бяха записани успешно.');
    // }
        // public function showEditTrainingWithData($training)
        //     {
        //         $trainingData = Training::find($training);
        //         return view('admin.trainingForm', ['training' => $trainingData]);
        //     }
        //     public function trainingUpdate(Request $request, Training $training)
        //     {
        //         // Retrieve the updated student data from the request
        //         $updatedData = $request->validate([
        //             'title'=> 'required',
        //             'description'=> 'required',
        //             'start_date'=> 'required',
        //             'end_date'=> 'required',
        //             'estimate'=> 'required',
        //         ]);
        //         // Update the student's attributes
        //         $training->update($updatedData);
        //         // Redirect back or to a specific route
        //         return redirect()->route('training.table')->with('success', 'Student updated successfully.');
        //     }
            public function showUploadForm()
        {
            return view('admin.upload');
        }
        public function upload(Request $request)
        {
            $file = $request->file('file');
            // Проверка дали е избран файл
            if ($file) {
                $name = $file->getClientOriginalName();
                // Качване на файла
                $file->move(public_path('uploads'), $name);
                // Записване на информацията за файла в базата данни
                File::create(['name' => $name]);
                return redirect()->back()->with('success', 'Файлът е качен успешно.');
            }
            return redirect()->back()->with('error', 'Грешка при качване на файла.');
        }
    // public function moduleUpdate(Request $request, $id, $moduleId)
    // {
    //     // Retrieve the training and module
    //     $training = Training::findOrFail($id);
    //     $module = Module::findOrFail($moduleId);
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'module_title' => 'required',
    //         'description' => 'required',
    //     ]);
    //     // Update the module with the validated data
    //     $module->title = $validatedData['module_title'];
    //     $module->description = $validatedData['description'];
    //     $module->save();
    //     // Redirect back with a success message
    //     return redirect()->back()->with('success', 'Module updated successfully.');
    // }
    // public function destroyModule(Module $module)
    //         {
    //             $module->delete();
    //             return redirect()->back()->with('success', 'You delete the training');
    //         }
    // public function lectureEdit($lecture)
    // {
    //     Lecture::find($lecture);
    //     return view('admin.lecture', ['lecture' => $lecture]);
    // }
    // public function lectureUpdate(Request $request, Lecture $lecture)
    // {
    //     // Retrieve the updated student data from the request
    //     $validatedData = $request->validate([
    //         'lecture_title'=> 'required',
    //         'lecture_description'=> 'required',
    //         'lecture_date'=> 'required',
    //     ]);
    //     $lecture->title = $validatedData['lecture_title'];
    //     $lecture->description = $validatedData['lecture_description'];
    //     $lecture->date = $validatedData['lecture_date'];
    //     // Update the student's attributes
    //     $lecture->save($validatedData);
    //     // Redirect back or to a specific route
    //     // Пренасочване към страницата със списък на лекциите или към друго място
    //     return redirect()->back()->with('success', 'lecture updated successfully.');
    // }
    // public function destroyLecture(Lecture $lecture)
    //         {
    //             $lecture->delete();
    //             return redirect()->back()->with('success', 'You delete the training');
    //         }
    // public function showHomework($id)
    // {
    //     $training = Training::find($id);
    //     $modules = Module::all();
    //     $lectures = Lecture::all();
    //     return view('admin.homework', compact('training' , 'modules' , 'lectures'));
    // }
    // public function homeworkStore(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'lecture_id' => 'required',
    //         'tasks.*' => 'required',
    //         'description.*' => 'required',
    //     ]);
    //     $lectureId = $request->input('lecture_id');
    //     $tasks = $request->input('tasks');
    //     $descriptions = $request->input('description');
    //     foreach ($tasks as $index => $tasks) {
    //         $homework = new Homework();
    //         $homework->lecture_id = $lectureId;
    //         $homework->tasks = $tasks;
    //         $homework->description = $descriptions[$index];
    //         $homework->save();
    //     }
    //     return redirect()->back()->with('success', 'Homework added successfully.');
    // }
    // public function showHomeworkTable($id)
    // {
    //     $module = Module::find($id);
    //     $lectures = Lecture::all();
    //     $homeworks = Homework::all();
    //     return view('admin.homeworkTable', compact('homeworks','lectures','module'));
    // }
    // public function homeworkEdit($homework)
    // {
    //     Homework::find($homework);
    //     return view('admin.homework', ['homework' => $homework]);
    // }
    // public function homeworkUpdate(Request $request, Homework $homework)
    // {
    //     // Retrieve the updated student data from the request
    //     $validatedData = $request->validate([
    //         'tasks'=> 'required',
    //         'description'=> 'required',
    //     ]);
    //     $homework->tasks = $validatedData['tasks'];
    //     $homework->description = $validatedData['description'];
    //     // Update the student's attributes
    //     $homework->save($validatedData);
    //     // Redirect back or to a specific route
    //     // Пренасочване към страницата със списък на лекциите или към друго място
    //     return redirect()->back()->with('success', 'lecture updated successfully.');
    // }
    // public function destroyHomework(Homework $homework)
    //         {
    //             $homework->delete();
    //             return redirect()->back()->with('success', 'You delete the training');
    //         }
    // public function showLectureTable($id)
    //         {
    //             $training = Training::find($id);
    //             $modules = Module::all();
    //             $lectures = Lecture::all();
    //             return view('admin.lectureTable', compact('lectures','modules','training'));
    //         }

// public function detailStore(Request $request)
// {
//     $request->validate([
//         'skill' => 'required|array',
//         'skill.*' => 'required',
//         'student_id' => 'required',
//     ]);
//     $skills = $request->input('skill');
//     $studentId = $request->input('student_id');
//     foreach ($skills as $skill) {
//         Skill::create([
//             'skill' => $skill,
//             'student_id' => $studentId,
//         ]);
//     }
//     $request->validate([
//         'hobby' => 'required|array',
//         'hobby.*' => 'required',
//         'student_id' => 'required',
//     ]);
//     $hobbies = $request->input('hobby');
//     $studentId = $request->input('student_id');
//     foreach ($hobbies as $hobby) {
//         Hobby::create([
//             'name' => $hobby,
//             'student_id' => $studentId,
//         ]);
//     }
//     $request->validate([
//         'messenger' => 'required',
//         'student_id' => 'required',
//     ]);
//         Messenger::create([
//             'messenger' => $request->input('messenger'),
//             'student_id' => $request->input('student_id'),
//         ]);
//     $request->validate([
//         'url' => 'required|array',
//         'url.*' => 'required',
//         'name' => 'required|array',
//         'name.*' => 'required',
//         'student_id' => 'required',
//     ]);
//     $urls = $request->input('url');
//     $names = $request->input('name');
//     $studentId = $request->input('student_id');
//     foreach ($urls as $index => $url) {
//         Webpage::create([
//             'url' => $url,
//             'name' => $names[$index],
//             'student_id' => $studentId,
//         ]);
//     }
//     $request->validate([
//         'language' => 'required|array',
//         'language.*' => 'required',
//         'score' => 'required|array',
//         'score.*' => 'required',
//         'student_id' => 'required',
//     ]);
//     $languages = $request->input('language');
//     $scores = $request->input('score');
//     $studentId = $request->input('student_id');
//     foreach ($languages as $index => $language) {
//         Language::create([
//             'language' => $language,
//             'score' => $scores[$index],
//             'student_id' => $studentId,
//         ]);
//     }
//     return redirect()->back()->with('success', 'Student created successfully.');
// }

    // public function studentDestroy(Student $student)
    //     {
    //         $student->delete();
    //         return redirect()->route('student.table')->with('success', 'Student deleted successfully.');
    //     }
        // public function deleteConfirmation(Student $student)
        // {
        //     return view('utils.delete_confirmation', compact('student'));
        // }
        // public function showEditFormWithData($student)
        // {
        //     $studentData = Student::find($student);
        //     return view('admin.studentsForm', ['student' => $studentData]);
        // }
//     public function showStudentForm()
// {
//     return view('admin.studentsForm',['students'=>Student::all()]);
// }
// public function showStudentSkill($id)
// {
//     $student = Student::find($id);
//     return view('admin.studentSkill',compact('student'));
// }
//     public function showStudentTable()
// {
//     return view('admin.studentsTable',['students'=>Student::all()]);
// }
}
