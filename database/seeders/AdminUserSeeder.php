<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Check if the admin user already exists
        $existingUser = User::where('email', 'admin@admin.com')->first();

        if (!$existingUser) {
            // Create the admin user if it doesn't exist
            User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'is_admin' => true, // Make sure this is set to true
            ]);
        } else {
            // Update the existing user (if needed)
            $existingUser->update([
                'password' => Hash::make('password'), // Update password or other fields if needed
            ]);
        }
    }
}