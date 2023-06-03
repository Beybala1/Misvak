<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'languages index',
            'languages create',
            'languages edit',
            'languages delete',
            'users index',
            'users create',
            'users edit',
            'users delete',
            'permissions index',
            'permissions create',
            'permissions edit',
            'permissions delete',
            'new-permission index',
            'new-permission create',
            'new-permission edit',
            'new-permission delete',
            'report index',
            'report delete',
            'information index',
            'information create',
            'information edit',
            'information delete',
            'dashboard index',
            'confirm-post',
            'team index',
            'slider index',
            'slider create',
            'slider edit',
            'slider delete',
            'category index',
            'category create',
            'category edit',
            'category delete',
            'products index',
            'products create',
            'products edit',
            'products delete',
            'about index',
            'about edit',
            'about delete',
            'contact-info index',
            'contact-info create',
            'contact-info edit',
            'contact-info delete',
            'social index',
            'social create',
            'social edit',
            'social delete',
            'message index',
            'message show',
            'message delete',
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
