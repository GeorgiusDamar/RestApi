<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Todolist;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

use App\Http\Requests\StoreTodolistRequest;
use App\Http\Requests\UpdateTodolistRequest;

class TodolistController extends Controller
{

    // public function index()
    // {

    //     return view('login');
    // }

    public function todolist()
    {
        $user = Auth::user();
        $student = Student::where('id', $user->id)->first();

        // dd($student);
        $todo = Todolist::where('studentId', $student->id)->get();

// dd($todo);

        return view('todolist', ['student' => $student, 'todo' => $todo]);
    }





    public function store(Request $request)
    {

        $user = Auth::user();
        $student = Student::where('id', $user->id)->first();
        $todo = new Todolist();


        $todo->todo = $request->task;
        $todo->studentId = $student->id;


        $todo->save();

        // Redirect ke rute 'user.todolist' setelah proses berhasil
        return redirect()->route('user.todolist');
    }




    public function complete(Todolist $task)
    {
        $task->update(['completed' => true]);
        // dd($task);
        return redirect()->back();
    }


    // public function destroy($todo)
    // {
    //     $todo = Todolist::find($todo->id);
    //     $todo->delete();
    //     return redirect()->back();
    // }

 

    public function destroy(Todolist $task)
    {
        $task->delete();
        return redirect()->back();
    }

 
}
