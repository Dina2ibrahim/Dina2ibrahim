<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAuthController extends Controller
{
    // دالة عرض صفحة تسجيل الدخول
    public function showLoginForm()
    {
        return view('auth.login'); // تأكدي من وجود هذه الصفحة
    }

    // دالة معالجة تسجيل الدخول
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('employees'); // تأكدي من وجود صفحة الموظفين
        }

        return back()->withErrors([
            'email' => 'بيانات الاعتماد غير صحيحة.',
        ]);
    }

    // دالة عرض صفحة التسجيل
    public function showRegisterForm()
    {
        return view('auth.register'); // تأكدي من وجود هذه الصفحة
    }

    // دالة معالجة التسجيل
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:managers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $manager = new Manager();
        $manager->name = $request->name;
        $manager->email = $request->email;
        $manager->password = bcrypt($request->password); // تأكدي من استخدام التشفير
        $manager->save();

        Auth::login($manager); // تسجيل الدخول تلقائيًا بعد التسجيل

        return redirect()->intended('employees'); // توجيه إلى صفحة الموظفين
    }

    // دالة لتسجيل الخروج
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // تأكدي من أن لديك مسار لتسجيل الدخول
    }
}
