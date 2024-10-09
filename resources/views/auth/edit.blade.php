@extends('layouts.app')

@section('content')
    <h2>Edit Employee</h2>

    <form method="POST" action="{{ route('employees.update', $employee) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Name</label>
        <input type="text" name="name" value="{{ $employee->name }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ $employee->email }}" required>

        <label>Phone</label>
        <input type="text" name="phone" value="{{ $employee->phone }}" required>

        <label>Picture</label>
        <input type="file" name="picture">
        @if ($employee->picture)
            <img src="{{ Storage::url($employee->picture) }}" alt="{{ $employee->name }}" width="100">
        @endif

        <button type="submit">Update Employee</button>
    </form>
@endsection
