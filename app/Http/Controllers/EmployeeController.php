<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $tasks = Task::where('user_id', auth()->id())->with(['project', 'status'])->get();
        return view('employee.tasks', compact('tasks'));
    }

    public function complete(Task $task) {
        $waiting = TaskStatus::where('name', 'Waiting for Verification')->first();

        $task->update([
            'task_status_id' => $waiting->id,
            'is_completed' => false,
        ]);

        return back()->with('success', 'Task marked for admin verification');
    }
}
