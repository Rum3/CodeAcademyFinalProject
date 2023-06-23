<?php

namespace App\Http\Controllers;

use App\Models\Training;

class TrainingController extends Controller
{
    public function renderTrainings($id){
        $training = Training::findOrFail($id);

        return view('availableTrainings',['training'=>$training, 'trainings'=>Training::all()]);
    }
}
