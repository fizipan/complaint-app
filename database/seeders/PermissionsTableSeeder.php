<?php

namespace Database\Seeders;

use App\Models\Permission;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Dashboard
                [
                    'title'      => 'dashboard_access',
                    'menus_id'   => '2',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'dashboard_filter',
                    'menus_id'   => '2',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End Dashboard
            // Section Menu (Management Access)
                [
                    'title'      => 'management_access',
                    'menus_id'   => '1',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End Section Menu (Management Access)
            // User
                [
                    'title'      => 'user_access',
                    'menus_id'   => '3',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'user_table',
                    'menus_id'   => '3',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'user_create',
                    'menus_id'   => '3',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'user_edit',
                    'menus_id'   => '3',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'user_show',
                    'menus_id'   => '3',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'user_delete',
                    'menus_id'   => '3',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'user_filter',
                    'menus_id'   => '3',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'user_reset_password',
                    'menus_id'   => '3',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End User
            // Role
                [
                    'title'      => 'role_access',
                    'menus_id'   => '4',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'role_table',
                    'menus_id'   => '4',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'role_create',
                    'menus_id'   => '4',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'role_edit',
                    'menus_id'   => '4',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'role_show',
                    'menus_id'   => '4',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'role_delete',
                    'menus_id'   => '4',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End Role
            // Permission
                [
                    'title'      => 'permission_access',
                    'menus_id'   => '5',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'permission_table',
                    'menus_id'   => '5',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'permission_create',
                    'menus_id'   => '5',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'permission_edit',
                    'menus_id'   => '5',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'permission_show',
                    'menus_id'   => '5',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'permission_delete',
                    'menus_id'   => '5',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'permission_filter',
                    'menus_id'   => '5',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End Permission
            // Section Menu (Master Data)
                [
                    'title'      => 'master_data_access',
                    'menus_id'   => '1',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End Section Menu (Master Data)
            // user type
                [
                    'title'      => 'user_type_access',
                    'menus_id'   => '6',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'user_type_table',
                    'menus_id'   => '6',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End user_type
            // country
                [
                    'title'      => 'country_access',
                    'menus_id'   => '7',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'country_table',
                    'menus_id'   => '7',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End country
            // province
                [
                    'title'      => 'province_access',
                    'menus_id'   => '8',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'province_table',
                    'menus_id'   => '8',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End province
            // regency
                [
                    'title'      => 'regency_access',
                    'menus_id'   => '9',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'regency_table',
                    'menus_id'   => '9',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End regency
            // district
                [
                    'title'      => 'district_access',
                    'menus_id'   => '10',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'district_table',
                    'menus_id'   => '10',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End district
            // category complaint
                [
                    'title'      => 'category_complaint_access',
                    'menus_id'   => '11',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'category_complaint_table',
                    'menus_id'   => '11',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'category_complaint_create',
                    'menus_id'   => '11',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'category_complaint_edit',
                    'menus_id'   => '11',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'category_complaint_show',
                    'menus_id'   => '11',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'category_complaint_delete',
                    'menus_id'   => '11',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End category complaint
            // Section Menu (Operational)
                [
                    'title'      => 'operational_access',
                    'menus_id'   => '1',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End Section Menu (Operational)
            // complaint
                [
                    'title'      => 'complaint_access',
                    'menus_id'   => '12',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'complaint_table',
                    'menus_id'   => '12',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'complaint_show',
                    'menus_id'   => '12',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'complaint_delete',
                    'menus_id'   => '12',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'complaint_filter',
                    'menus_id'   => '12',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'complaint_export',
                    'menus_id'   => '12',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
            // End complaint
            // complaint response
                [
                    'title'      => 'complaint_response_access',
                    'menus_id'   => '13',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
                [
                    'title'      => 'complaint_response_create',
                    'menus_id'   => '13',
                    'created_at' => '2021-03-15 00:00:00',
                    'updated_at' => '2021-03-15 00:00:00',
                ],
        ];

        Permission::insert($permissions);
    }
}
