@extends('layouts.adminsidebar')


@section('content')
<div class="container">
    <h2>Edit Permission</h2>

    <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Permission Name</label>
            <input type="text" name="name" value="{{ $permission->name }}" class="form-control" required>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
