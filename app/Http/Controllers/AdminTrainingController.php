<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Lecture;
use App\Models\Homework;
use App\Models\Training;
use Illuminate\Http\Request;

class AdminTrainingController extends Controller
{
    public function showTrainingTable() {
        return view('admin.trainingTable');
    }
    public function showTrainingForm() {
        return view('admin.trainingForm');
    }

    public function storeTraining(Request $request) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'estimate' => 'nullable|integer',
        ]);

        Training::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'estimate' => $request->input('estimate'),
        ]);
    return redirect()->back()->with('success', 'The operation was succesful!');
    }

    public function showTrainingEditForm($training) {

        $trainingData = Training::find($training);
        return view('admin.trainingForm', ['training' => $trainingData]);
    }

    public function updateTraining(Request $request, Training $training) {

        $updatedData = $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'start_date'=> 'required',
            'end_date'=> 'required',
            'estimate'=> 'required',
        ]);

        $training->update($updatedData);

        return redirect()->route('training.table')->with('success', 'Student updated successfully.');
    }

    public function deleteTraining(Training $training) {

        $training->delete();
        return redirect()->back()->with('success', 'You delete the training');
    }

    public function showModule($id) {

        $training = Training::find($id);
        return view('admin.module', compact('training'));
    }
    public function showModuleTable($id) {

        $training = Training::find($id);
        $modules = Module::all();

        return view('admin.moduleTable', compact('training' , 'modules'));
    }

    public function storeModule(Request $request, int $id) {

        $training = Training::find($id);

            $request->validate([
            'module_title.*' => 'required|string',
            'description.*' => 'required|string',
        ]);

        $moduleTitles = $request->input('module_title');
        $description = $request->input('description');
        foreach ($moduleTitles as $index => $title) {
            $module = new Module();
            $module->title = $title;
            $module->description = $description[$index];
            $module->training_id = $training->id;
            $module->save();
        }
        return redirect()->back()->with('success', 'Операцията беше успешна!');
    }

    public function editModule($module, $id) {

        $training = Training::find($id);
        $moduleData = Module::find($module);

        return view('admin.module', ['module' => $moduleData, 'training' => $training]);
    }

    public function updateModule(Request $request, $id, $moduleId) {

        $training = Training::findOrFail($id);
        $module = Module::findOrFail($moduleId);

        $validatedData = $request->validate([
            'module_title' => 'required',
            'description' => 'required',
        ]);

        $module->title = $validatedData['module_title'];
        $module->description = $validatedData['description'];
        $module->save();

        return redirect()->back()->with('success', 'Module updated successfully.');
    }
    public function deleteModule(Module $module) {

        $module->delete();
        return redirect()->back()->with('success', 'You delete the training');
    }

    public function showLecture($id) {

        $training = Training::find($id);
        $modules = Module::all();

        return view('admin.lecture', compact('training' , 'modules'));
    }

    public function showLectureTable($id) {

        $training = Training::find($id);
        $modules = Module::all();
        $lectures = Lecture::all();
        return view('admin.lectureTable', compact('lectures','modules','training'));
    }

    public function storeLecture(Request $request)
    {
        // $trainingId = Training::find($id);

        $request->validate([
            'lecture_title.*' => 'required',
            'lecture_description.*' => 'required',
            'lecture_date.*' => 'required',
            'module_id' => 'required',
            'training_id' => 'required',
        ]);
        $lectureTitles = $request->input('lecture_title');
        $lectureDescriptions = $request->input('lecture_description');
        $lectureDates = $request->input('lecture_date');
        $moduleId = $request->input('module_id');
        $trainingId = $request->input('training_id');
        $lectures = [];
        foreach ($lectureTitles as $index => $lectureTitle) {
            $lecture = new Lecture();
            $lecture->title = $lectureTitle;
            $lecture->description = $lectureDescriptions[$index];
            $lecture->date = $lectureDates[$index];
            $lecture->module_id = $moduleId;
            $lecture->training_id = $trainingId;
            $lecture->save();
            $lectures[] = $lecture;
        }
        return redirect()->back()->with('success', 'Лекциите бяха записани успешно.');
    }

    public function editLecture($lecture) {

        Lecture::find($lecture);
        return view('admin.lecture', ['lecture' => $lecture]);
    }

    public function updateLecture(Request $request, Lecture $lecture) {

        $validatedData = $request->validate([
            'lecture_title'=> 'required',
            'lecture_description'=> 'required',
            'lecture_date'=> 'required',
        ]);
        $lecture->title = $validatedData['lecture_title'];
        $lecture->description = $validatedData['lecture_description'];
        $lecture->date = $validatedData['lecture_date'];

        $lecture->save($validatedData);

        return redirect()->back()->with('success', 'lecture updated successfully.');
    }
    public function deleteLecture(Lecture $lecture) {

        $lecture->delete();
        return redirect()->back()->with('success', 'You delete the training');
    }

    public function showHomework($id) {

        $training = Training::find($id);
        $modules = Module::all();
        $lectures = Lecture::all();

        return view('admin.homework', compact('training' , 'modules' , 'lectures'));
    }

    public function storeHomework(Request $request) {

        $request->validate([
            'training_id' => 'required',
            'module_id' => 'required',
            'lecture_id' => 'required',
            'tasks.*' => 'required',
            'description.*' => 'required',
        ]);
        $lectureId = $request->input('lecture_id');
        $trainingId = $request->input('training_id');
        $moduleId = $request->input('module_id');
        $titles = $request->input('titles');
        $descriptions = $request->input('description');
        foreach ($titles as $index => $titles) {
            $homework = new Homework();
            $homework->lecture_id = $lectureId;
            $homework->training_id = $trainingId;
            $homework->module_id = $moduleId;
            $homework->title = $titles;
            $homework->description = $descriptions[$index];
            $homework->save();
        }

        return redirect()->back()->with('success', 'Homework added successfully.');
    }

    public function showHomeworkTable($id) {

        $module = Module::find($id);
        $lectures = Lecture::all();
        $homeworks = Homework::all();

        return view('admin.homeworkTable', compact('homeworks','lectures','module'));
    }

    public function editHomework($homework) {

        Homework::find($homework);

        return view('admin.homework', ['homework' => $homework]);
    }

    public function updateHomework(Request $request, Homework $homework) {

        $validatedData = $request->validate([
            'tasks'=> 'required',
            'description'=> 'required',
        ]);
        $homework->tasks = $validatedData['tasks'];
        $homework->description = $validatedData['description'];

        $homework->save($validatedData);

        return redirect()->back()->with('success', 'lecture updated successfully.');
    }

    public function deleteHomework(Homework $homework) {

        $homework->delete();

        return redirect()->back()->with('success', 'You delete the training');
    }



}
