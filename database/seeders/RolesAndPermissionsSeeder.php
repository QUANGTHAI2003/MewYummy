<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'View products',
            'Create product',
            'Update product',
            'Delete product',
            'View categories',
            'Create category',
            'Update category',
            'Delete category',
            'Manage users',
            'Authorizations',
        ];

        // create permissions
        foreach ($permissions as $permission){
            if (!Permission::where('name', $permission)->first()){
                Permission::create(['name' => $permission]);
            }
        }

        $adminRole   = Role::firstOrCreate(['name' => 'admin']);
        $ownerRole   = Role::firstOrCreate(['name' => 'owner']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);

        $adminRole->syncPermissions($permissions);
        $ownerRole->syncPermissions(array_diff($permissions, ['Authorizations']));
        $editorRole->syncPermissions([
            'View products',
            'Create product',
        ]);

        // assign role to admin
        $admin = User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('12345678'),
        ]);

        $admin->assignRole($adminRole);

        // assign role to owner
        $owner = User::factory()->create([
            'name'     => 'Owner',
            'email'    => 'owner@example.com',
            'password' => Hash::make('12345678'),
        ]);

        $owner->assignRole($ownerRole);

        // assign role to partner
        $editor = User::factory()->create([
            'name'     => 'Editor',
            'email'    => 'editor@example.com',
            'password' => Hash::make('12345678'),
        ]);

        $editor->assignRole($editorRole);
    }
}
