<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function login()
    {
        return view('layouts.login');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'فیلد نام کاربری الزامی است.',
            'password.required' => 'فیلد رمز الزامی است.',
        ]);
        if ($validator->fails()) {
            return redirect('v1/login')
                ->withErrors($validator)
                ->withInput();
        }

        if (!auth()->attempt($request->only('username', 'password'))) {
            return back()->with('status', 'نام کاربری یا رمز عبور اشتباه است');
        } else {
            return redirect('v1/dashboard');
        }
    }
}
