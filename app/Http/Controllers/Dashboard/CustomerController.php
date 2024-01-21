<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('dashboard.customers.index',compact('customers'));
    }
    public function getlogin(){
        return view('dashboard.customers.auth.signin');
    }

    function CustomerSignup(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:6',
        ]);

        $customers = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //Auth::login($customers);
        Auth::guard('customers')->login($customers);

        return redirect()->route('resturant.index')->with('success', 'تم التسجيل وتسجيل الدخول بنجاح');
    }

    public function CustomerSignin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customers')->attempt($credentials)) {
            return redirect()->route('resturant.index')->with('success', 'تم تسجيل الدخول بنجاح');
        }

        return redirect()->back()->with('error', 'فشل تسجيل الدخول، يرجى التحقق من البريد الإلكتروني وكلمة المرور');
    }

    public function destroy($id)
    {
        $customers = Customer::destroy($id);
        if ($customers) {
            return redirect()->route('customers.index')->with('success', 'customer deleted successfully');
        } else {
            return redirect()->route('customers.index')->with('error', 'customer not found');
        }
    }

    public function logout()
    {
        Auth::guard('customers')->logout();
        return redirect()->route('resturant.index')->with('success', 'تم تسجيل الخروج بنجاح');
    }
}
