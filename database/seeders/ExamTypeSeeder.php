<?php

namespace Database\Seeders;

use App\Models\ExamType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $examTypes = [
            ['name' => 'Final Exam'],
            ['name' => 'Midterm Exam'],
            ['name' => 'Practical'],
        ];

        foreach ($examTypes as $examType) {
            ExamType::create($examType);
        }
    }
}
