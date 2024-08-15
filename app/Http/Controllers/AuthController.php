<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->route('home');
        } else {
            return redirect()->back()->withInput()->with('errorMessage', 'Email/Kata sandi salah!');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'is_store_open' => 'required',
            'store_name' => 'nullable|required_if:is_store_open,true|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->store_status = $request->is_store_open == 'true';
        $user->store_name = $request->store_name;

        if ($user->save()) {
            return redirect()->route('registerSuccess');
        } else {
            return redirect()->back();
        }
    }

    public function registerSuccess()
    {
        return view('auth.register-success');
    }
}
