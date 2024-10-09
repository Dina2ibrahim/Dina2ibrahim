@extends('layouts.app')

@section('content')
    <h2>تسجيل الدخول</h2>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">البريد الإلكتروني</label>
        <input type="email" name="email" required>

        <label for="password">كلمة المرور</label>
        <input type="password" name="password" required>

        <button type="submit">تسجيل الدخول</button>
    </form>
@endsection
