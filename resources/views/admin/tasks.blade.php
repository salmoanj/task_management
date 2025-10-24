@include('layouts.adminsidebar')
<div style="margin-left:220px;padding:20px;">
<h2>Create Task</h2>
<form method="POST" action="{{ route('admin.tasks.store') }}">
@csrf
<input type="text" name="name" placeholder="Task Name" required><br>
<textarea name="description" placeholder="Description"></textarea><br>

<select name="user_id">
    @foreach($employees as $e)
        <option value="{{ $e->id }}">{{ $e->name }}</option>
    @endforeach
</select><br>

<select name="project_id">
    @foreach($projects as $p)
        <option value="{{ $p->id }}">{{ $p->name }}</option>
    @endforeach
</select><br>

<select name="task_status_id">
    @foreach($statuses as $s)
        <option value="{{ $s->id }}">{{ $s->name }}</option>
    @endforeach
</select><br>

<input type="date" name="deadline"><br>
<button type="submit">Create Task</button>
</form>

<h3>Existing Tasks</h3>
<table border="1" cellpadding="8">
<tr><th>Name</th><th>User</th><th>Status</th></tr>
@foreach($tasks as $task)
<tr>
<td>{{ $task->name }}</td>
<td>{{ $task->user->name }}</td>
<td>{{ $task->status->name }}</td>
</tr>
@endforeach
</table>
</div>
