<h1>الموظفون التابعون للمدير: {{ $manager->name }}</h1>

<ul>
    @foreach ($employees as $employee)
        <li>
            {{ $employee->name }} - {{ $employee->email }} - {{ $employee->phone }}
            @if($employee->picture)
                <img src="{{ asset('storage/' . $employee->picture) }}" alt="Employee Picture" style="width: 50px;">
            @endif
        </li>
    @endforeach
</ul>


<form action="{{ route('employee.store', $manager->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="اسم الموظف" required>
    <input type="email" name="email" placeholder="البريد الإلكتروني" required>
    <input type="text" name="phone" placeholder="رقم الهاتف" required>
    <input type="file" name="picture">
    <button type="submit">إضافة موظف جديد</button>
</form>
