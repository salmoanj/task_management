<h2>My Tasks</h2>
<table border="1" cellpadding="8">
<tr><th>Name</th><th>Project</th><th>Deadline</th><th>Status</th><th>Action</th></tr>
@foreach($tasks as $task)
<tr>
<td>{{ $task->name }}</td>
<td>{{ $task->project->name }}</td>
<td>{{ $task->deadline }}</td>
<td>{{ $task->status->name }}</td>
<td>
@if($task->status->name == 'Pending')
    <form method="POST" action="{{ route('employee.tasks.complete', $task->id) }}">
        @csrf
        <button>Mark Complete</button>
    </form>
@elseif($task->status->name == 'Waiting for Verification')
    Waiting for Admin Verification
@endif
</td>
</tr>
@endforeach
</table>

<a href="{{ route('logout') }}">Logout</a>
