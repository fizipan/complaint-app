<?php

namespace Database\Seeders;

use App\Models\Menus;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = [
            // 1. Section Menu
            [
                'name'          => 'Section Menu',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            // 2. Dashboard
            [
                'name'          => 'Dashboard',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            // 3. User
            [
                'name'          => 'User',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            // 4. Role
            [
                'name'          => 'Role',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            // 5. Permission
            [
                'name'          => 'Permission',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            // 6. User Type
            [
                'name'          => 'User Type',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            // 7. Country
            [
                'name'          => 'Country',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            // 8. Province
            [
                'name'          => 'Province',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            // 9. Regency
            [
                'name'          => 'Regency',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            // 10. District
            [
                'name'          => 'District',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            // 11. Category Complaint
            [
                'name'          => 'Category Complaint',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            // 12. Complaint
            [
                'name'          => 'Complaint',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            // 13. Complaint Response
            [
                'name'          => 'Complaint Response',
                'information'   => '',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
        ];

        Menus::insert($menu);
    }
}
