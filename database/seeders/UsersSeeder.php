<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
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
               'name'     => 'Admin',
               'email'    => 'admin@admin.com',
               'password' => 12345678,
               'role'     => 'admin'
            ],
            [
               'name'     => 'User',
               'email'    => 'user@user.com',
               'password' => 12345678,
               'role'     => 'user'
            ],
            [
               'name'     => 'Admin',
               'email'    => 'incharge@incharge.com',
               'password' => 12345678,
               'role'     => 'incharge'
            ]
        ];

        foreach ($users as $user) {
            $existUser = User::where('email', $user['email'])->first();
            if (!$existUser) {
                User::create([
                    'name'      => $user['name'],
                    'email'     => $user['email'],
                    'password'  => Hash::make($user['password']),
                    'role'      => $user['role']
                ]);
            }
        }
    }
}
