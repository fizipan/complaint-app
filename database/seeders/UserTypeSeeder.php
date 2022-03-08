<?php

namespace Database\Seeders;

use App\Models\MasterData\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_type = [
            [
                'name'      => 'Admin',
                'created_at' => '2022-01-19 00:00:00',
                'updated_at' => '2022-01-19 00:00:00',
            ],
            [
                'name'      => 'Officer',
                'created_at' => '2022-01-19 00:00:00',
                'updated_at' => '2022-01-19 00:00:00',
            ],
            [
                'name'      => 'Complainant',
                'created_at' => '2022-01-19 00:00:00',
                'updated_at' => '2022-01-19 00:00:00',
            ],
            [
                'name'      => 'Guest',
                'created_at' => '2022-01-19 00:00:00',
                'updated_at' => '2022-01-19 00:00:00',
            ],
        ];

        UserType::insert($user_type);
    }
}
