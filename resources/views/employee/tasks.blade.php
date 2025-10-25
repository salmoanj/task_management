@extends('layouts.adminsidebar')

@section('content')
<div style="margin-left:220px; padding:20px;">
    <h2>My Tasks</h2>

    <table border="1" cellpadding="8" style="border-collapse: collapse; width:100%;">
        <tr style="background-color:#f2f2f2;">
            <th>Name</th>
            <th>Project</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->name }}</td>
            <td>{{ $task->project->name }}</td>
            <td>{{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}</td>
            <td>{{ $task->status->name }}</td>
            <td>
                @if($task->status->name == 'Pending')
                    <form method="POST" action="{{ route('employee.tasks.complete', $task->id) }}">
                        @csrf
                        <button type="submit" style="background-color:green; color:white; border:none; padding:6px 10px; border-radius:4px;">
                            Mark Complete
                        </button>
                    </form>
                @elseif($task->status->name == 'Waiting for Verification')
                    <span style="color:orange;">Waiting for Admin Verification</span>
                @else
                    <span style="color:gray;">{{ $task->status->name }}</span>
                @endif
            </td>
        </tr>
        @endforeach
    </table>

    <div style="margin-top:20px;">
        <a href="{{ route('logout') }}" style="color:red; text-decoration:none;">Logout</a>
    </div>
</div>
@endsection
