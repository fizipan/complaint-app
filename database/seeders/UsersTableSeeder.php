<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'           => 'Admin Bot',
                'user_type_id'   => '1',
                'email'          => 'admin@mail.com',
                'password'       => '$2y$10$jA0iQrNaBwxrqITQEETQeOADwQZxyqo0BSfi6ngEuNz9H8MF.8vYG', //Admin@12345
                'remember_token' =>  null,
                'created_at'     => '2021-03-15 00:00:00',
                'updated_at'     => '2021-03-15 00:00:00',
            ],
            [
                'name'           => 'Officer Bot',
                'user_type_id'   => '2',
                'email'          => 'officer@mail.com',
                'password'       => '$2a$12$/SLhelsPX7l3sMXIQgsw7OQefoa2Hr3mCc4DuuTGohA9PK/R8FUYi', //Officer@12345
                'remember_token' =>  null,
                'created_at'     => '2021-03-15 00:00:00',
                'updated_at'     => '2021-03-15 00:00:00',
            ],
        ];

        User::insert($users);
    }
}
