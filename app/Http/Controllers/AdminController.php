<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.index', compact('users'));
    }

    public function verifyUser($id)
    {
        $user = User::find($id);
        $role = Role::where('name', 'mahasiswa')->first();
        $user->role_id = $role->id;
        $user->save();

        return redirect()->route('admin.index')->with('success', 'User verified successfully.');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.edit', compact('user', 'roles'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role_id' => 'required|exists:roles,id',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_saat_ini' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'nomor_hp' => 'required|string|max:15',
            'kewarganegaraan' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'status_menikah' => 'required|string|max:20',
            'agama' => 'required|string|max:50',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->alamat_ktp = $request->alamat_ktp;
        $user->alamat_saat_ini = $request->alamat_saat_ini;
        $user->kabupaten = $request->kabupaten;
        $user->provinsi = $request->provinsi;
        $user->nomor_telepon = $request->nomor_telepon;
        $user->nomor_hp = $request->nomor_hp;
        $user->kewarganegaraan = $request->kewarganegaraan;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->status_menikah = $request->status_menikah;
        $user->agama = $request->agama;
        $user->save();

        return redirect()->route('admin.index')->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'User deleted successfully.');
    }

    public function createUser()
    {
        $roles = Role::all();
        return view('admin.create', compact('roles'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_saat_ini' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'nomor_hp' => 'required|string|max:15',
            'kewarganegaraan' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'status_menikah' => 'required|string|max:20',
            'agama' => 'required|string|max:50',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'alamat_ktp' => $request->alamat_ktp,
            'alamat_saat_ini' => $request->alamat_saat_ini,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'nomor_telepon' => $request->nomor_telepon,
            'nomor_hp' => $request->nomor_hp,
            'kewarganegaraan' => $request->kewarganegaraan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_menikah' => $request->status_menikah,
            'agama' => $request->agama,
        ]);

        return redirect()->route('admin.index')->with('success', 'User created successfully.');
    }
}