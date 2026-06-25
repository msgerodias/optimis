<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'username' => 'admin',
            ],
            [
                'name' => 'DSWD Administrator',
                'email' => 'admin@optimis.local',
                'password' => Hash::make('p@ssw0rd'),
                'user_type' => 'dswd',
                'profile_id' => null,
            ]
        );
    }
}