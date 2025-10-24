<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $tasks = Task::with(['user', 'project', 'status'])->latest()->get();
        return view('admin.dashboard', compact('tasks'));
    }

    public function index() {
        $employees = User::whereHas('role', fn($q) => $q->where('name', 'employee'))->get();
        $projects = Project::all();
        $statuses = TaskStatus::all();
        $tasks = Task::with(['user', 'project', 'status'])->get();

        return view('admin.tasks', compact('employees', 'projects', 'statuses', 'tasks'));
    }

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
