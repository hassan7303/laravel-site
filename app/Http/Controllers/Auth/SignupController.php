<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{

    private static $errorPrefix = 10;
    public function signup()
    {
        return view('layouts.signup');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'username' => 'required|max:255',
            'gmail' => 'required|max:255|regex:/^[a-zA-Z0-9_.+-]+@gmail\.com$/',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'name.required' => 'فیلد نام الزامی است.',
            'name.string' => 'لطفاً فقط از حروف استفاده کنید.',
            'name.max' => 'طول نام باید حداکثر ۱۰۰ کاراکتر باشد.',
            'username.required' => 'فیلد نام کاربری الزامی است.',
            'username.max' => 'طول نام کاربری باید حداکثر ۲۵۵ کاراکتر باشد.',
            'gmail.required' => 'فیلد جیمیل الزامی است.',
            'gmail.max' => 'طول جیمیل باید حداکثر ۲۵۵ کاراکتر باشد.',
            'gmail.regex' => 'فرمت جیمیل وارد شده صحیح نمی‌باشد.',
            'password.required' => 'فیلد رمز الزامی است.',
            'password.min' => 'طول رمز باید حداقل ۸ کاراکتر باشد.',
            'password.confirmed' => 'رمز و تکرار آن مطابقت ندارند.',
            'password_confirmation.required' => 'فیلد تکرار رمز الزامی است.',
        ]);
        if ($validator->fails()) {
            return redirect('v1/signup')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->gmail = $request->gmail;
            $user->password = Hash::make($request->password);
            $user->token  = Str::random(64);
            $user->save();
            auth()->attempt($request->only('username', 'password'));
        } catch (QueryException $e) {
            $errors = $e->getMessage();
            if (str_contains($errors, 'username')) {
                return  [
                    "status" => false,
                    "error" => [
                        "code" => 500,
                        "message" => "نام کاربری قبلا استفاده شده است",
                        "line" => "#" . self::$errorPrefix . __LINE__
                    ]
                ];
            } elseif (str_contains($errors, 'gmail')) {
                return [
                    "status" => false,
                    "error" => [
                        "code" => 500,
                        "message" => " جیمیل وارد شده قبلا استفاده شده است",
                        "line" => "#" . self::$errorPrefix . __LINE__
                    ]
                ];
            }
        }
        return
            redirect()->route('dashboard');
    }
}
