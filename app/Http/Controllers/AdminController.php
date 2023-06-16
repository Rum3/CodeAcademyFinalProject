<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdminDash(){
        return view('Admin.dashboard');
    }

    public function showUsers(){
        $users = User::all();
        return view('Admin.users', ['users'=>$users]);
    }

    public function showEditForm($id){
        $user = User::findOrFail($id);

        return view('Admin.edit-user', ['user' => $user]);
    }

    public function updateUser(Request $request, $id){
        // $users = User::all();
        $user = User::findOrFail($id);

        // dd($request);

        $user->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'role'=>$request->input('role_type'),
        ]);

        return redirect()->route('users-table')->with('message' , "The user is updated succesfully!");
    }

    public function deleteUser($id){
        // $users = User::all();
        $user = User::find($id);

        // dd($id);

        $user->delete();

        return redirect()->route('users-table')->with('message' , "The user is removed succesfully!");
    }

    public function showPages(){
        return view('pages');
    }
}
