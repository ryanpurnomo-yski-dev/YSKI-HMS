<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        switch(true){
            case !$user:
                return response()->json([
                    'message' => 'Data Tidak Ditemukan'
                ], 401);
                break;
            case $user:
                Auth::login($user);
                request()->session()->regenerate();
                return redirect()->route('dashboard');
                return response()->json([
                    'message' => 'Berhasil Sign In'
                ], 200);
                break;
            default:
                return response()->json([
                    'message' => 'Data Email/Password Salah'
                ]);
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('/');
    }

    public function profile(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        dd($user);
    }
}
