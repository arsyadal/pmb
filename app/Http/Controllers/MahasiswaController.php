<?php
// app/Http/Controllers/MahasiswaController.php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function create()
    {
        // Periksa apakah data mahasiswa sudah ada
        if (Auth::user()->mahasiswa) {
            return redirect()->route('mahasiswa.index')->with('error', 'Anda sudah mengisi data diri.');
        }

        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        // Periksa apakah data mahasiswa sudah ada
        if (Auth::user()->mahasiswa) {
            return redirect()->route('mahasiswa.index')->with('error', 'Anda sudah mengisi data diri.');
        }

        $request->validate([
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

        Mahasiswa::create([
            'user_id' => Auth::id(),
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

        return redirect()->route('dashboard')->with('success', 'Data mahasiswa berhasil disimpan.');
    }
    
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
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

        $mahasiswa->update([
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

        return redirect()->route('admin.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('admin.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
