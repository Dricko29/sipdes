<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create inventaris', 'module' => 'inventaris', 'guard_name' => 'web']);
        Permission::create(['name' => 'read inventaris', 'module' => 'inventaris', 'guard_name' => 'web']);
        Permission::create(['name' => 'update inventaris', 'module' => 'inventaris', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete inventaris', 'module' => 'inventaris', 'guard_name' => 'web']);

        Permission::create(['name' => 'create surat', 'module' => 'surat', 'guard_name' => 'web']);
        Permission::create(['name' => 'read surat', 'module' => 'surat', 'guard_name' => 'web']);
        Permission::create(['name' => 'update surat', 'module' => 'surat', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete surat', 'module' => 'surat', 'guard_name' => 'web']);

        Permission::create(['name' => 'create pegawai', 'module' => 'pegawai', 'guard_name' => 'web']);
        Permission::create(['name' => 'read pegawai', 'module' => 'pegawai', 'guard_name' => 'web']);
        Permission::create(['name' => 'update pegawai', 'module' => 'pegawai', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete pegawai', 'module' => 'pegawai', 'guard_name' => 'web']);

        Permission::create(['name' => 'create penduduk', 'module' => 'penduduk', 'guard_name' => 'web']);
        Permission::create(['name' => 'read penduduk', 'module' => 'penduduk', 'guard_name' => 'web']);
        Permission::create(['name' => 'update penduduk', 'module' => 'penduduk', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete penduduk', 'module' => 'penduduk', 'guard_name' => 'web']);

        Permission::create(['name' => 'create keluarga', 'module' => 'keluarga', 'guard_name' => 'web']);
        Permission::create(['name' => 'read keluarga', 'module' => 'keluarga', 'guard_name' => 'web']);
        Permission::create(['name' => 'update keluarga', 'module' => 'keluarga', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete keluarga', 'module' => 'keluarga', 'guard_name' => 'web']);

        Permission::create(['name' => 'create pembangunan', 'module' => 'pembangunan', 'guard_name' => 'web']);
        Permission::create(['name' => 'read pembangunan', 'module' => 'pembangunan', 'guard_name' => 'web']);
        Permission::create(['name' => 'update pembangunan', 'module' => 'pembangunan', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete pembangunan', 'module' => 'pembangunan', 'guard_name' => 'web']);

        Permission::create(['name' => 'create pengaduan', 'module' => 'pengaduan', 'guard_name' => 'web']);
        Permission::create(['name' => 'read pengaduan', 'module' => 'pengaduan', 'guard_name' => 'web']);
        Permission::create(['name' => 'update pengaduan', 'module' => 'pengaduan', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete pengaduan', 'module' => 'pengaduan', 'guard_name' => 'web']);


        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo(Permission::all());

        $role2 = Role::create(['name' => 'petugas']);

        $role3 = Role::create(['name' => 'kades']);
        $role4 = Role::create(['name' => 'user']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Petugas',
            'email' => 'petugas@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Kades',
            'email' => 'kades@example.com',
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
        ]);
        $user->assignRole($role4);
    }
}