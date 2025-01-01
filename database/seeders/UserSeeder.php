<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'fname' => 'admin',
                'lname' => 'lname',
                'email' => 'admin@uoe.edu.pk',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'),
                'phone_number' => '1234567890',
                'cnic' => '1234567890123',
                'role_id' => 1, // Adjust according to your roles table
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'fname' => 'student',
                'lname' => 'lname',
                'email' => 'student@uoe.edu.pk',
                'email_verified_at' => now(),
                'password' => Hash::make('student123'),
                'phone_number' => '1234567890',
                'cnic' => '0987654321123',
                'role_id' => 3, // Adjust according to your roles table
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'fname' => 'faculty',
                'lname' => 'lname',
                'email' => 'faculty@uoe.edu.pk',
                'email_verified_at' => now(),
                'password' => Hash::make('faculty123'),
                'phone_number' => '1234567890',
                'cnic' => '1231234567890',
                'role_id' => 2, // Adjust according to your roles table
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'fname' => 'applicant',
                'lname' => 'lname',
                'email' => 'applicant@uoe.edu.pk',
                'email_verified_at' => now(),
                'password' => Hash::make('applicant123'),
                'phone_number' => '1234567890',
                'cnic' => '1230987654321',
                'role_id' => 4, // Adjust according to your roles table
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'fname' => 'jobsApplicant',
                'lname' => 'lname',
                'email' => 'jobsApplicant@uoe.edu.pk',
                'email_verified_at' => now(),
                'password' => Hash::make('jobsApplicant123'),
                'phone_number' => '1234567890',
                'cnic' => '1230347654321',
                'role_id' => 5, // Adjust according to your roles table
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
