<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class TodolistController extends Controller
{

    public function index()
    {
        $todolists = todolist::all();
        return view('home', compact('todolists'));
    }


    public function store(Request $request)
    {dd(auth()->user());
        $data = $request->validate([
            'content' => 'required',
            'user_id' => auth()->user()->id
        ]);

        todolist::create($data);
        return back();
    }



    public function destroy(todolist $todolist)
    {
        $todolist->delete();
        return back();
    }



}
