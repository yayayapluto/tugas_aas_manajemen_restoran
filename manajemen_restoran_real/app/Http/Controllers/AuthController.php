<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view("app.auth.login");
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'msg' => $validator->errors()->first(),
            ], 400);
        }

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return response()->json([
                'success' => true,
                'msg' => 'Login berhasil.',
                'route' => route('home'),
            ]);
        }

        return response()->json([
            'success' => false,
            'msg' => 'Nama pengguna atau password salah.',
        ], 401);
    }

    public function formRegister()
    {
        return view("app.auth.register");
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'msg' => $validator->errors()->first(),
            ], 400);
        }

        if (User::where('name', $request->name)->exists()) {
            return response()->json([
                'success' => false,
                'msg' => 'Nama pengguna sudah terdaftar.',
            ], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'staff',
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'msg' => 'Pendaftaran berhasil. Kamu sudah login sekarang.',
            'route' => route('home'),
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route("login");
    }
}
