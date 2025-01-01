<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['name' => 'Mathematics'],
            ['name' => 'Computer Science'],
            ['name' => 'Physics'],
            ['name' => 'Chemistry'],
            ['name' => 'Biology'],
            ['name' => 'Statistics'],
            ['name' => 'Geography'],
            ['name' => 'English Literature'],
            ['name' => 'Languages'],
            ['name' => 'Arabic'],
            ['name' => 'Philosophy'],
            ['name' => 'Civics'],
            ['name' => 'Education'],
            ['name' => 'Islamiyat'],
            ['name' => 'Fine Arts'],
            ['name' => 'Psychology'],
            ['name' => 'Commerce'],
            ['name' => 'Accounting'],
            ['name' => 'Economics'],
            ['name' => 'Banking'],

        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
