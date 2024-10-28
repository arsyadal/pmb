<?php
// app/Models/Mahasiswa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'alamat_ktp', 'alamat_saat_ini', 'kabupaten', 'provinsi',
        'nomor_telepon', 'nomor_hp', 'kewarganegaraan', 'tanggal_lahir', 'tempat_lahir',
        'jenis_kelamin', 'status_menikah', 'agama'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}