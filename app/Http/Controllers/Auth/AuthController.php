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
                    'status' => 'error',
                    'message' => 'Data Tidak Ditemukan'
                ], 401);
                break;
            case $user:
                Auth::login($user);
                request()->session()->regenerate();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil Sign In',
                    'redirect' => route('dashboard')
                ], 200);
                break;
            default:
                return response()->json([
                    'status' => 'error',
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
        return redirect('/');
    }

    public function edit(Request $request)
    {
        try{
            $userId = auth()->id();
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $userId,
            ]);
            User::where('id', $userId)->update($validated);
            return redirect()->route('profile');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
