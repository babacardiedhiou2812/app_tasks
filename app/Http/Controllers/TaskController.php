<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    
    public function index()
    {       
            $tasks = Auth::user()->created_task;
            return View('tasks.index',[
                'tasks' => $tasks
            ]);
    }

    public function MyTask()
    {       
            
        $tasks = Auth::user()->assigned;
        return View('tasks.TaskAssigned',[
            'tasks' => $tasks
        ]);
    }
    // public function show()
    // {
        
    // }

    // public function create()
    // {

    // }

    // public function store()
    // {

    // }

    // public function edit()
    // {

    // }

}