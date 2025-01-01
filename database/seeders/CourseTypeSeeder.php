<?php

namespace Database\Seeders;

use App\Models\CourseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courseTypes = [
            [
                'name' => 'Compulsory',
                'credits' => 4,
            ],
            [
                'name' => 'Elective',
                'credits' => 3,
            ],
            [
                'name' => 'University Elective',
                'credits' => 2,
            ],
        ];

        foreach ($courseTypes as $courseType) {
            CourseType::create($courseType);
        }
    }
}
