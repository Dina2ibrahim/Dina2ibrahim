@extends('layouts.app')

@section('content')
    <h2>Add Employee</h2>

    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
        @csrf

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Phone</label>
        <input type="text" name="phone" required>

        <label>Picture</label>
        <input type="file" name="picture">

        <button type="submit">Add Employee</button>
    </form>
@endsection
