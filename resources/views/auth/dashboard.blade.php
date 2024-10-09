
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <h2>Your Employees</h2>
    <a href="{{ route('employees.create') }}">Add Employee</a>
    <ul>
        @foreach ($employees as $employee)
            <li>
                {{ $employee->name }} - 
                <a href="{{ route('employees.edit', $employee) }}">Edit</a>
                <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
