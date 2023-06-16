<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ADD_EDIT;
class ADD_EDITController extends Controller
{
    public function create()
    {
        return view('Admin.add_editUsers');
    }

    public function store(Request $request)
    {
        ADD_EDIT::create($request->all());

        return redirect()->back()->with('success', 'Потребителят е добавен успешно.');
    }

    public function edit(ADD_EDIT $user)
    {
        return view('Admin.add_editUsers', compact('user'));
    }

    public function update(Request $request, ADD_EDIT $user)
    {
        $user->update($request->all());

        return redirect()->back()->with('success', 'Потребителят е редактиран успешно.');
    }
}

