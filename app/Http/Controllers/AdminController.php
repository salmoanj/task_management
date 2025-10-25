<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
{
    $users = User::where('role_id',5)->get(); 

    $query = Task::with(['user', 'project', 'status'])->latest();

    if ($request->has('user_id') && $request->user_id != '') {
        $query->where('user_id', $request->user_id);
    }

    $tasks = $query->get();

    return view('admin.dashboard', compact('tasks', 'users'));
}

    public function index() {
        $employees = User::where('role_id',5)->get();
        $projects = Project::all();
        $statuses = TaskStatus::all();
        $tasks = Task::with(['user', 'project', 'status'])->get();

        return view('admin.tasks', compact('employees', 'projects', 'statuses', 'tasks'));
    }

//     public function index(Request $request)
// {
//     $employees = User::where('role_id', 5)->get();
//     $projects = Project::all();
//     $statuses = TaskStatus::all();

//     $query = Task::with(['user', 'project', 'status']);

//     // Filter by user if user_id is provided
//     if ($request->filled('user_id')) {
//         $query->where('user_id', $request->user_id);
//     }

//     $tasks = $query->get();

//     return view('admin.tasks', compact('employees', 'projects', 'statuses', 'tasks'))
//         ->with('selectedUser', $request->user_id);
// }



    

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'project_id' => 'required',
            'task_status_id' => 'required',
            'deadline' => 'required|date',
        ]);

        Task::create($request->all());
        return back()->with('success', 'Task created successfully');
    }

    public function approve(Task $task) {
        $task->update([
            'task_status_id' => TaskStatus::where('name', 'Completed')->first()->id,
            'is_completed' => true,
        ]);
        return back()->with('success', 'Task approved.');
    }

    public function reassign(Request $request, Task $task) {
        $task->update([
            'task_status_id' => TaskStatus::where('name', 'Pending')->first()->id,
            'admin_message' => $request->message,
            'is_completed' => false
        ]);
        return back()->with('success', 'Task reassigned.');
    }
}
