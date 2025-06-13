<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToDoRequest;
use App\Models\Todo; 

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::latest()->paginate(10);
        return view('home', compact('todos'));
    }

    public function add(){
        return view('add');
    }

    public function edit(){
        return view('update');
    }


      public function delete(){
        return view('delete');
    }

    public function store(ToDoRequest $request)
    {
        $validated = $request->validated();
        if($request->hasFIle('photo'))
        {
            $path = $request->file('photo')->store('images', 'public');
            $validated['photo'] = 'storage/' . $path;
        }

        Todo::create($validated);
        return redirect('/');
    }

    public function update(ToDoRequest $request){
         $validated = $request->validated();
        if($request->hasFIle('photo'))
        {
            $path = $request->file('photo')->store('images', 'public');
            $validated['photo'] = 'storage/' . $path;
        }
        Todo::where('id', $request['id'])->update($validated);
        return redirect('/');
    }

    public function updateView($id){
        $todo = Todo::where('id', $id)->get();
        return view('update', ['todo'=> $todo[0]]);
    }

    public function destroy($id){
        Todo::where('id', $id)->delete();
        return back();
    }
}
