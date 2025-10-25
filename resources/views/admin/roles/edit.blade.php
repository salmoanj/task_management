@extends('layouts.adminsidebar')


@section('content')
<div class="container">
    <h2>Edit Role</h2>

    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Role Name</label>
            <input type="text" name="name" value="{{ $role->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Permissions</label><br>
            @foreach($permissions as $perm)
                <label>
                    <input type="checkbox" name="permissions[]" value="{{ $perm->id }}" 
                    {{ $role->permissions->contains($perm->id) ? 'checked' : '' }}>
                    {{ $perm->name }}
                </label><br>
            @endforeach
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
