@extends('layouts.app')

@section('content')
    <h2>تسجيل جديد</h2>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="name">الاسم</label>
        <input type="text" name="name" required>

        <label for="email">البريد الإلكتروني</label>
        <input type="email" name="email" required>

        <label for="password">كلمة المرور</label>
        <input type="password" name="password" required>

        <button type="submit">تسجيل</button>
    </form>
@endsection
