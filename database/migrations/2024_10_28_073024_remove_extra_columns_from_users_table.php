<?php
// database/migrations/xxxx_xx_xx_remove_extra_columns_from_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveExtraColumnsFromUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'alamat_ktp', 
                'alamat_saat_ini', 
                'kabupaten', 
                'provinsi',
                'nomor_telepon', 
                'nomor_hp', 
                'kewarganegaraan', 
                'tanggal_lahir', 
                'tempat_lahir', 
                'jenis_kelamin', 
                'status_menikah', 
                'agama'
            ]);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
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
        });
    }
}