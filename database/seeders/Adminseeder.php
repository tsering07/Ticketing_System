<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Enums\UserRole;   
use App\Models\User;       

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                "name"=> "Admin user",
                "email"=> "admin@gmail.com",
                'role'=>UserRole::Admin,
                "password"=> Hash::make("12345678"),
            ]
            );
    }
}
