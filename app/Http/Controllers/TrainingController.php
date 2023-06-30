<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function renderTrainings($id){
        $training = Training::findOrFail($id);

        return view('availableTrainings',['training'=>$training, 'trainings'=>Training::all()]);
    }

    public function assignStudents(Request $request, $trainingId)
{
    $studentIds = $request->input('students');

    $training = Training::findOrFail($trainingId);
    $training->students()->sync($studentIds);

    return response()->json('Students assigned to the training successfully.');
}

}

