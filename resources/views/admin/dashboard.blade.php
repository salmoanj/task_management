@include('layouts.adminsidebar')
<div style="margin-left:220px;padding:20px;">
<h2>All Tasks</h2>
<table border="1" cellpadding="8">
<tr><th>Name</th><th>User</th><th>Project</th><th>Status</th><th>Deadline</th><th>Action</th></tr>
@foreach($tasks as $task)
<tr>
<td>{{ $task->name }}</td>
<td>{{ $task->user->name }}</td>
<td>{{ $task->project->name }}</td>
<td>{{ $task->status->name }}</td>
<td>{{ $task->deadline }}</td>
<td>
@if($task->status->name == 'Waiting for Verification')
    <form method="POST" action="{{ route('admin.tasks.approve',$task->id) }}">
        @csrf <button>Approve</button>
    </form>
    <form method="POST" action="{{ route('admin.tasks.reassign',$task->id) }}">
        @csrf
        <input type="text" name="message" placeholder="Reason">
        <button>Reassign</button>
    </form>
@endif
</td>
</tr>
@endforeach
</table>
</div>
