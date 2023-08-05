<?php

namespace Database\Seeders;

use Exception;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        try {
            // Reset cached roles and permissions
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            // Create permissions in bulk
            $permissions = collect([
                ['name' => 'View products', 'guard_name' => 'web'],
                ['name' => 'Create product', 'guard_name' => 'web'],
                ['name' => 'Update product', 'guard_name' => 'web'],
                ['name' => 'Delete product', 'guard_name' => 'web'],
                ['name' => 'View categories', 'guard_name' => 'web'],
                ['name' => 'Create category', 'guard_name' => 'web'],
                ['name' => 'Update category', 'guard_name' => 'web'],
                ['name' => 'Delete category', 'guard_name' => 'web'],
                ['name' => 'View attrbutes', 'guard_name' => 'web'],
                ['name' => 'Create attribute', 'guard_name' => 'web'],
                ['name' => 'Update attribute', 'guard_name' => 'web'],
                ['name' => 'Delete attribute', 'guard_name' => 'web'],
                ['name' => 'View coupons', 'guard_name' => 'web'],
                ['name' => 'Create coupon', 'guard_name' => 'web'],
                ['name' => 'Update coupon', 'guard_name' => 'web'],
                ['name' => 'Delete coupon', 'guard_name' => 'web'],
                ['name' => 'View orders', 'guard_name' => 'web'],
                ['name' => 'Create order', 'guard_name' => 'web'],
                ['name' => 'Update order', 'guard_name' => 'web'],
                ['name' => 'Delete order', 'guard_name' => 'web'],
                ['name' => 'View settings', 'guard_name' => 'web'],
                ['name' => 'Update settings', 'guard_name' => 'web'],
                ['name' => 'Manage users', 'guard_name' => 'web'],
                ['name' => 'Authorizations', 'guard_name' => 'web']
            ]);

            Permission::insert($permissions->toArray());

            $roles = collect([
                ['guard_name' => 'web', 'name' => 'admin', 'description' => 'Vai trò này có quyền truy cập vào tất cả các chức năng của hệ thống'],
                ['guard_name' => 'web', 'name' => 'owner', 'description' => 'Vai trò này có quyền truy cập vào tất cả các chức năng của hệ thống, ngoại trừ phân quyền'],
                ['guard_name' => 'web', 'name' => 'editor', 'description' => 'Vai trò này có quyền truy cập vào các chức năng quản lý sản phẩm']
            ]);

            Role::insert($roles->toArray());

            $permissionIds = Permission::pluck('id')->toArray();

            // Assign permissions to roles
            $adminPermissions  = $permissionIds;
            $ownerPermissions  = array_diff($permissionIds, [10]); // exclude 'Authorizations' permission
            $editorPermissions = [1, 2]; // 'View products', 'Create product'

            Role::find(1)->permissions()->sync($adminPermissions);
            Role::find(2)->permissions()->sync($ownerPermissions);
            Role::find(3)->permissions()->sync($editorPermissions);

            $users = collect([
                [
                    'name'         => 'Admin',
                    'email'        => 'admin@example.com',
                    'password'     => Hash::make('12345678'),
                    'last_seen_at' => '2023-07-25 02:11:36'
                ],
                [
                    'name'         => 'Owner',
                    'email'        => 'owner@example.com',
                    'password'     => Hash::make('12345678'),
                    'last_seen_at' => '2023-07-25 02:11:36'
                ],
                [
                    'name'         => 'Editor',
                    'email'        => 'editor@example.com',
                    'password'     => Hash::make('12345678'),
                    'last_seen_at' => '2023-07-25 02:11:36'
                ],
                [
                    'name'         => 'quangthai',
                    'email'        => 'tranquangthai.10102003@gmail.com',
                    'password'     => Hash::make('12345678'),
                    'last_seen_at' => '2023-07-25 02:11:36'
                ]
            ]);

            User::insert($users->toArray());

            // Assign roles to users
            User::find(1)->assignRole('admin');
            User::find(2)->assignRole('owner');
            User::find(3)->assignRole('editor');

            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
