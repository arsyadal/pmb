<?php
// database/migrations/xxxx_xx_xx_create_mahasiswa_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('alamat_ktp')->nullable();
            $table->string('alamat_saat_ini')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('status_menikah')->nullable();
            $table->string('agama')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}