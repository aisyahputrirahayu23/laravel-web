<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cache permission (Wajib agar tidak error)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // role dengan huruf kecil
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser  = Role::create(['name' => 'user']);

        // membuat Akun admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'], // cek email biar ga duplikat
            [
                'name'     => 'Administrator',
                'password' => Hash::make('password'), // Passwordnya : password
            ]
        );
        $admin->assignRole($roleAdmin); // <-- Kasih jabatan Admin

        // Buat Akun User Biasa
        $user = User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name'     => 'User Biasa',
                'password' => Hash::make('password'), // Passwordnya : password
            ]
        );
        $user->assignRole($roleUser); // <--- Kasih jabatan User
    }
}
