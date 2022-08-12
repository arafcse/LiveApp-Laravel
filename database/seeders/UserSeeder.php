<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=> 'User 1',
                'email' => 'User1@gmail.com',
                'password'=> bcrypt('password')
            ],
            [
                'name'=> 'User 2',
                'email' => 'User2@gmail.com',
                'password'=> bcrypt('password')
            ],
            [
                'name'=> 'User 3',
                'email' => 'User3@gmail.com',
                'password'=> bcrypt('password')
            ],
        ];

        User::insert($user);
    }
}
