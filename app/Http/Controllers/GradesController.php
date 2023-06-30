<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Absence;
use App\Models\Lecture;
use App\Models\Homework;
use App\Models\Training;
use App\Models\HomeworkTask;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreAbsenceRequest;

class GradesController extends Controller
{

    public function getTrainings()
    {
        $trainings = Training::select('id', 'title')->get();

        return response()->json($trainings);
    }

    public function getModules(Request $request)
    {
        $selectedTraining = $request->input('training_id');
        $modules = Module::select('id', 'title')->where('training_id', $selectedTraining)->get();

        return response()->json($modules);
    }

    public function getLectures(Request $request)
    {
        $selectedModule = $request->input('module_id');
        $lectures = Lecture::select('id','title','date')->where('module_id', $selectedModule)->get();

        return response()->json($lectures);
    }

    public function getStudents($trainingId)
    {
        $students = Training::findOrFail($trainingId)
            ->students()
            ->select('students.id', 'students.first_name')
            ->get();

        return response()->json($students);
    }

    public function getHomework(Request $request)
    {
        $selectedLecture = $request->input('lecture_id');
        $homeworks = Homework::select('id','title')->where('lecture_id', $selectedLecture)->get();

        return response()->json($homeworks);
    }

    public function storeAbsence(Request $request)
    {


        $request->validate([
            'attendance_status' => 'required',
            'disregarded' => 'nullable',
            'training_id' => 'required',
            'module_id' => 'required',
            'lecture_id' => 'required',
            'student_id' => 'required',
            'note' => 'nullable|string',
        ]);

        $attendanceStatus = $request->input('attendance_status');

        // dd($attendanceStatus);

        Absence::create([
            'attendance_status' => $attendanceStatus,
            'disregarded' => $request->input('disregarded') ? true : false,
            'training_id' => $request->input('training_id'),
            'module_id' => $request->input('module_id'),
            'student_id' => $request->input('student_id'),
            'lecture_id' => $request->input('lecture_id'),
            'note' => $request->input('note'),
        ]);


        $request->validate([
            'has_homework' => 'nullable|boolean',
            'not_working' => 'nullable|boolean',
            'on_time' => 'nullable|boolean',
            'grade' => 'required',
            'training_id' => 'required',
            'module_id' => 'required',
            'lecture_id' => 'required',
            'student_id' => 'required',
        ]);


        $homeworkIds = $request->input('homework_id');
        $homeworkIdsArr = explode(',', $homeworkIds);
        // dd($homeworkIdsArr);

        $grades = $request->input('grade');
        // dd($grades);

        foreach($homeworkIdsArr as $key=>$value){
              // Create the homework task record
              $grade = $grades[$key];
              HomeworkTask::create([
                'has_homework' => $request->input("has_homework_{$value}") ? true : false,
                'not_working' => $request->input("not_working_{$value}") ? true : false,
                'on_time' => $request->input("on_time_{$value}") ? true : false,
                'grade' => $grade,
                'training_id' => $request->input('training_id'),
                'module_id' => $request->input('module_id'),
                'student_id' => $request->input('student_id'),
                'lecture_id' => $request->input('lecture_id'),
                'homework_id' => $value,
            ]);
        }

        return redirect()->back()->with('success', 'Absence recorded successfully.');
    }

//     public function calculateGrades(Request $request, $lectureId) {

//     // Calculate average grade for the lecture
//     $averageGradeLecture = HomeworkTask::where('lecture_id', $lectureId)->avg('grade');

//     // Get module IDs associated with the lecture
//     $moduleIds = HomeworkTask::where('lecture_id', $lectureId)->distinct('module_id')->pluck('module_id');

//     $averageGradesModules = [];

//     foreach ($moduleIds as $moduleId) {
//         // Calculate average grade for each module
//         $averageGradeModule = HomeworkTask::where('module_id', $moduleId)->avg('grade');

//         $averageGradesModules[] = [
//             'module_id' => $moduleId,
//             'average_grade_module' => $averageGradeModule,
//         ];
//     }

//     // Calculate average grade for the training
//     $trainingIds = HomeworkTask::where('lecture_id', $lectureId)->distinct('training_id')->pluck('training_id');

//     $averageGradeTraining = 0;
//     $trainingCount = 0;

//     foreach ($trainingIds as $trainingId) {
//         $averageGradeTraining += HomeworkTask::where('training_id', $trainingId)->avg('grade');
//         $trainingCount++;
//     }

//     if ($trainingCount > 0) {
//         $averageGradeTraining /= $trainingCount;
//     }

//     // Prepare the response data
//     $responseData = [
//         'average_grade_lecture' => $averageGradeLecture,
//         'average_grades_modules' => $averageGradesModules,
//         'average_grade_training' => $averageGradeTraining,
//     ];

//     // Return the response as JSON
//     return response()->json($responseData);
// }

public function getTrainingAverageGrade($studentId, $trainingId)
{
    $averageGrade = HomeworkTask::where('student_id', $studentId)
        ->where('training_id', $trainingId)
        ->avg('grade');

    return new JsonResponse(['average_grade_training' => $averageGrade]);
}

public function getModuleAverageGrade($moduleId, $trainingId, $studentId)
{
    $averageGrade = HomeworkTask::where('module_id', $moduleId)
        ->where('training_id', $trainingId)
        ->where('student_id', $studentId)
        ->avg('grade');

    return new JsonResponse(['average_grade_module' => $averageGrade]);
}

public function getLectureAverageGrade($lectureId, $moduleId, $trainingId, $studentId)
{
    $averageGrade = HomeworkTask::where('lecture_id', $lectureId)
        ->where('module_id', $moduleId)
        ->where('training_id', $trainingId)
        ->where('student_id', $studentId)
        ->avg('grade');

    return new JsonResponse(['average_grade_lecture' => $averageGrade]);
}

}
