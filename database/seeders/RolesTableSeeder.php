<?php
// database/seeders/RolesTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'guest']);
        Role::create(['name' => 'mahasiswa']);
        Role::create(['name' => 'admin']);
    }
}