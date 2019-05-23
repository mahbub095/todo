<?php

namespace App\Http\Controllers;

use Session;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller

{
    public function index()
    {
        $todos = Todo::all();
        return view('todos')->with('todos', $todos);
    }

    public function store(Request $request)
    {

        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->save();
        
        Session::flash('success', 'Your todo was created.');
        return redirect()->back();
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        Session::flash('success', 'Your todo was deleted.');
        return redirect()->back();
    }


}
