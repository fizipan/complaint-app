<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Set Admin Permission
        $permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($permissions->pluck('id'));

        // Set officer Permission
        $officer_permissions = $permissions->filter(function ($permission) {
            return $permission->title != 'management_access' && substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_' && $permission->title != 'master_data_access' && substr($permission->title, 0, 8) != 'country_' && substr($permission->title, 0, 9) != 'province_' && substr($permission->title, 0, 8) != 'regency_' && substr($permission->title, 0, 9) != 'district_' && substr($permission->title, 0, 19) != 'category_complaint_';
        });
        Role::findOrFail(2)->permissions()->sync($officer_permissions);

        // set complainant Permission
        $complainant_permissions = $permissions->filter(function ($permission) {
            return $permission->title != 'management_access' && substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_' && $permission->title != 'master_data_access' && substr($permission->title, 0, 8) != 'country_' && substr($permission->title, 0, 9) != 'province_' && substr($permission->title, 0, 8) != 'regency_' && substr($permission->title, 0, 9) != 'district_' && substr($permission->title, 0, 19) != 'category_complaint_' && substr($permission->title, 0, 19) != 'complaint_response_' && $permission->title != 'complaint_delete' && $permission->title != 'complaint_reject' && $permission->title != 'complaint_export';
        });

        Role::findOrFail(3)->permissions()->sync($complainant_permissions);
    }
}
