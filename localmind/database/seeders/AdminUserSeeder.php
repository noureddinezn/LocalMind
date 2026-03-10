<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed an admin user (idempotent).
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@localmind.test');
        $password = env('ADMIN_PASSWORD', 'Admin12345!');

        User::firstOrCreate(
            ['email' => $email],
            [
                'name' => env('ADMIN_NAME', 'Admin'),
                'password' => Hash::make($password),
                'role' => 'admin',
            ]
        );
    }
}
