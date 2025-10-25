@include('layouts.adminsidebar')

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
    }

    .content {
        margin-left: 240px;
        padding: 30px;
    }

    h2, h3 {
        font-weight: 600;
        color: #333;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
        border-left: 5px solid #007bff;
        padding-left: 10px;
    }

    h3 {
        margin-top: 40px;
        margin-bottom: 15px;
        font-size: 20px;
        color: #444;
    }

    form {
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        max-width: 600px;
    }

    input[type="text"],
    input[type="date"],
    textarea,
    select {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        outline: none;
        transition: border-color 0.3s;
    }

    input:focus,
    textarea:focus,
    select:focus {
        border-color: #007bff;
    }

    textarea {
        height: 80px;
        resize: vertical;
    }

    button {
        background-color: #007bff;
        border: none;
        color: white;
        padding: 10px 18px;
        border-radius: 6px;
        font-size: 15px;
        cursor: pointer;
        transition: background 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        border-radius: 10px;
        overflow: hidden;
        margin-top: 15px;
    }

    th, td {
        text-align: left;
        padding: 12px 16px;
    }

    th {
        background-color: #007bff;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 0.5px;
    }

    tr:nth-child(even) {
        background-color: #f9fafb;
    }

    tr:hover {
        background-color: #eef4ff;
        transition: 0.3s;
    }

    td {
        color: #555;
        font-size: 15px;
    }
</style>

<div class="content">
    <h2>Create Task</h2>

    <form method="POST" action="{{ route('admin.tasks.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Task Name" required>
        <textarea name="description" placeholder="Description"></textarea>

        <select name="user_id" required>
            <option value="">-- Select User --</option>
            @foreach($employees as $e)
                <option value="{{ $e->id }}">{{ $e->name }}</option>
            @endforeach
        </select>

        <select name="project_id" required>
            <option value="">-- Select Project --</option>
            @foreach($projects as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select>

        <select name="task_status_id" required>
            <option value="">-- Select Status --</option>
            @foreach($statuses as $s)
                <option value="{{ $s->id }}">{{ $s->name }}</option>
            @endforeach
        </select>

        <input type="date" name="deadline" required>

        <button type="submit">Create Task</button>
    </form>

    <h3>Existing Tasks</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>User</th>
            <th>Status</th>
        </tr>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->name }}</td>
            <td>{{ $task->user->name }}</td>
            <td>{{ $task->status->name }}</td>
        </tr>
        @endforeach
    </table>
</div>
