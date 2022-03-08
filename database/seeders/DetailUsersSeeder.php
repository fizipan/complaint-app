<?php

namespace Database\Seeders;

use App\Models\DetailUsers;

use Illuminate\Database\Seeder;

class DetailUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detail_users = [
            [
                'users_id'       => 1,
                'number_id'      => '',
                'date_of_birth'  => null,
                'gender'         => 1,
                'photo'          => '',
                'mobile_phone'   => '',
                'information'    => '',
                'address'        => '',
                'status'         => 1,
                'created_at'     => '2021-03-15 00:00:00',
                'updated_at'     => '2021-03-15 00:00:00',
            ],
            [
                'users_id'       => 2,
                'number_id'      => '',
                'date_of_birth'  => null,
                'gender'         => 1,
                'photo'          => '',
                'mobile_phone'   => '',
                'information'    => '',
                'address'    => '',
                'status'         => 1,
                'created_at'     => '2021-03-15 00:00:00',
                'updated_at'     => '2021-03-15 00:00:00',
            ],
        ];

        DetailUsers::insert($detail_users);
    }
}
