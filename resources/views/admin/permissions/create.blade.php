@extends('layouts.adminsidebar')


@section('content')
<div class="container">
    <h2>Add Permission</h2>

    <form method="POST" action="{{ route('permissions.store') }}">
        @csrf
        <div class="mb-3">
            <label>Permission Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
