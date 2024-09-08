<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                // 'name' => 'Damar',
                'email' => 'damar@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('damar111'),
                // 'role' => 'owner',
                'verify_key' => Str::random(10)
            ]
            ];

        DB::table('users')->insert($data);
    }
}
