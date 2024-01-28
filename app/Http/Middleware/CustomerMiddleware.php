<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // تحقق من حالة تسجيل الدخول والدور إذا كان هناك
        if (Auth::guard('customers')->check()) {
            // المستخدم مسجل الدخول
            return $next($request);
        } else {
            // المستخدم غير مسجل الدخول، قم بتوجيهه إلى صفحة تسجيل الدخول المناسبة
            return redirect()->route('login.form'); // تأكد من أن 'login.form' هو اسم الطريق الخاص بصفحة تسجيل الدخول
        }
    }
}
