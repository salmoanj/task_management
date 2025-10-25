@extends('layouts.adminsidebar')


@section('content')
<div class="container">
    <h2>Add Role</h2>

    <form method="POST" action="{{ route('roles.store') }}">
        @csrf
        <div class="mb-3">
            <label>Role Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Permissions</label><br>
            @foreach($permissions as $perm)
                <label><input type="checkbox" name="permissions[]" value="{{ $perm->id }}"> {{ $perm->name }}</label><br>
            @endforeach
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
