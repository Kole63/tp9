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
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);

        $editorRole->givePermissionTo(Permission::create(['name' => 'create item']));
        $editorRole->givePermissionTo(Permission::create(['name' => 'edit item']));
        $editorRole->givePermissionTo(Permission::create(['name' => 'delete item']));

        Permission::create(['name' => 'create supplier']);
        Permission::create(['name' => 'edit supplier']);
        Permission::create(['name' => 'delete supplier']);
    }
}
