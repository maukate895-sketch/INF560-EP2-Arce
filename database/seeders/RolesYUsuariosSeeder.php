<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesYUsuariosSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach (['admin', 'guia', 'turista'] as $rol) {
            Role::firstOrCreate([
                'name' => $rol,
                'guard_name' => 'web',
            ]);
        }

        $usuarios = [
            ['Administrador TuriPotosí', 'admin@turipotosi.test', 'admin'],
            ['Guía Uno', 'guia1@turipotosi.test', 'guia'],
            ['Guía Dos', 'guia2@turipotosi.test', 'guia'],
            ['Turista Uno', 'turista1@turipotosi.test', 'turista'],
            ['Turista Dos', 'turista2@turipotosi.test', 'turista'],
        ];

        foreach ($usuarios as [$nombre, $correo, $rol]) {
            $usuario = User::firstOrCreate(
                ['email' => $correo],
                ['name' => $nombre, 'password' => 'password']
            );

            $usuario->syncRoles([$rol]);
        }

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}