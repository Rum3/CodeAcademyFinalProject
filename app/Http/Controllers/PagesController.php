<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome() {

        return view('static.welcome');
    }
    public function info() {
        return view('static.info');
    }

    public function accSettings () {
        return view('static.accSettings');
    }
}
