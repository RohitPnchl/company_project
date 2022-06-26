<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
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

        foreach ($admins as $admin) {
            $existAdmin = User::where('email', $admin['email'])->first();
            if (!$existAdmin) {
                User::create([
                    'name'      => $admin['name'],
                    'email'     => $admin['email'],
                    'password'  => Hash::make($admin['password']),
                    'role'      => $admin['role']
                ]);
            }
        }
    }
}
