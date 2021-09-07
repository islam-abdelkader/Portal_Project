<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        Project::where(['user_id' => Auth::id()])->findOrFail($request->pid);
        $tasks = Task::where(['project_id' => $request->pid])->get();
        return view('front.Projects.Tasks.tasks', ['tasks' => $tasks]);
    }
    // public function store(Request $request)
    // {
    //     $task = Task::create([
    //         'title' => $request->task_title,
    //         'project_id' => 2,
    //         'user_id' => Auth::id(),
    //     ]);
    //     return $task;
    // }
}
