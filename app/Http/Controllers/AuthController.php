<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Role;
use App\Models\Shipping_address;

use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        // Cek apakah email terdaftar di database
        $user = User::where('email', $credentials['email'])->first();
    
        if ($user) {
            // Email ditemukan, sekarang cek apakah password cocok
            if (Hash::check($credentials['password'], $user->password)) {
                // Jika password benar, lakukan autentikasi
                Auth::login($user);
                
                session()->put([
                    'id_user' => $user['id'],
                    'username' => $user['fullname'],
                ]);

                return response()->json(['success' => true, 'message' => 'Login Berhasil']);
            } else {
                // Jika password salah
                return response()->json(['error' => true, 'message' => 'Password Salah']);
            }
        } else {
            // Jika email tidak ditemukan
            return response()->json(['error' => true, 'message' => 'Oops Email Belum Terdaftar']);
        }
    }

    public function register(Request $request)
    {
        try {
            
            if (User::where('email', $request->email)->exists()) {
                return response()->json(['error' => true, 'message' => 'Email Sudah Terdaftar']);
            } if (User::where('handphone', $request->handphone)->exists()) {
                return response()->json(['error' => true, 'message' => 'Handphone Sudah Terdaftar']);
            }
        
            $role = Role::where('name', 'user')->value('id');
            
            $user = User::create([
                'fullname'   => $request->fullname,
                'email'      => $request->email,
                'password'   => Hash::make($request->password),
                'handphone'  => $request->handphone,
                'date'       => $request->date,
                'gender'     => $request->gender,
                'role'       => $role,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['success' => true, 'message' => 'Registrasi Berhasil']);

        } catch (Exception $err) {
            dd($err);
        }
    }

    public function checkEmail(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();
        
        return response()->json(['exists' => $emailExists]);
    }

    public function checkHandphone(Request $request)
    {
        $handphoneExists = User::where('handphone', $request->handphone)->exists();
        
        return response()->json(['exists' => $handphoneExists]);
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            session()->flush(); // Untuk menghapus semua session
            return response()->json(['success' => true, 'message' => 'Logout berhasil']);
        } catch (Exception $err) {
            dd($err);
        }
    }
}

