<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
        $empleado = Role::create(['name' => 'empleado']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$admin, $user, $empleado]);
        Permission::create(['name' => 'dashboard.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'dashboard.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'cita.index'])->syncRoles([$admin, $user, $empleado]);
        Permission::create(['name' => 'cita.store'])->syncRoles([$admin, $user, $empleado]);
        Permission::create(['name' => 'cita.create'])->syncRoles([$admin, $user, $empleado]);
        Permission::create(['name' => 'cita.destroy'])->syncRoles([$admin, $user, $empleado]);
        Permission::create(['name' => 'citad.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'citad.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'citad.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'citad.destroy'])->syncRoles([$admin]);
        Permission::create(['name' => 'citae.index'])->syncRoles([$empleado]);
        Permission::create(['name' => 'citae.store'])->syncRoles([$empleado]);
        Permission::create(['name' => 'citae.create'])->syncRoles([$empleado]);
        Permission::create(['name' => 'citae.destroy'])->syncRoles([$empleado]);
        Permission::create(['name' => 'usuario.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuario.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuario.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuario.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'servicio.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'servicio.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'servicio.destroy'])->syncRoles([$admin]);
        Permission::create(['name' => 'servicio.update'])->syncRoles([$admin]);
    }
}
