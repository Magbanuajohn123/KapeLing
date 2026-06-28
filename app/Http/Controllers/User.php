<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Psy\Readline\Hoa\Console;

class User extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function registerStore(Request $request)
    {
        $customer = $request->validate([
            'Firstname' => 'required|string',
            'Middlename' => 'required|string',
            'Lastname' => 'required|string',
            'Address' => 'required|string',
            'Contact_No' => 'required|regex:/^09\d{9}$/',
            'Email' => 'required|email|unique:tb_customer,email',
            'Password' => 'required|min:8',
        ]);
        Customer::create([
            'Firstname' => $customer['Firstname'],
            'Middlename' => $customer['Middlename'],
            'Lastname' => $customer['Lastname'],
            'Address' => $customer['Address'],
            'Contact_No' => $customer['Contact_No'],
            'email' => $customer['Email'],
            'password' => Hash::make($customer['Password']),

        ]);
        return redirect('login');
    }
    public function login()
    {
        return view('login');
    }
    public function loginProceed(Request $request)
    {
        try {
            $credentials = [
                'email' => $request->Email,
                'password' => $request->Password
            ];

            if (Auth::guard('web')->attempt($credentials)) {
                $request->session()->regenerate();
                return back()->with([
                    'success' => 'Successfully Login. Proceeding to Home Page',
                    'redirect' => 'home'
                ]);
            } elseif (Auth::guard('admin')->attempt($credentials)) {
                $request->session()->regenerate();
                return back()->with([
                    'success' => 'Successfully Login. Proceeding to Dashboard',
                    'redirect' => '/adminDashboard'
                ]);
            }

            return back()->with('error', 'Invalid credentials');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function home()
    {
        return view('home');
    }
    public function dashboard()
    {
        return view('adminDashboard');
    }
    public function category()
    {
        return view('adminCategory');
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login')->with('success', 'Successfully Logout');
    }
}
