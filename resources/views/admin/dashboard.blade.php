@include('layouts.adminsidebar')

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
    }

    .content {
        margin-left: 220px;
        padding: 30px;
    }

    h2 {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        border-left: 5px solid #007bff;
        padding-left: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        border-radius: 10px;
        overflow: hidden;
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

    form {
        display: inline-block;
        margin-right: 6px;
    }

    input[type="text"] {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px 8px;
        font-size: 14px;
    }

    button {
        background-color: #007bff;
        border: none;
        color: white;
        padding: 6px 12px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    .reassign-btn {
        background-color: #ffc107;
    }

    .reassign-btn:hover {
        background-color: #e0a800;
    }

    td form + form {
        margin-top: 6px;
    }
</style>

<div class="content">
    <h2>All Tasks</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>User</th>
            <th>Project</th>
            <th>Status</th>
            <th>Deadline</th>
            <th>Action</th>
        </tr>
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
                        @csrf 
                        <button>Approve</button>
                    </form>
                    <form method="POST" action="{{ route('admin.tasks.reassign',$task->id) }}">
                        @csrf
                        <input type="text" name="message" placeholder="Reason">
                        <button class="reassign-btn">Reassign</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
