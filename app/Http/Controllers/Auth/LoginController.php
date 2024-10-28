<?php
// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->role->name == 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role->name == 'mahasiswa') {
                return redirect()->route('mahasiswa.index');
            }
        }

        return back()->withErrors([
            'email' => 'Akun kamu belum terverifikasi, tunggu admin untuk memverifikasi akun kamu.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}