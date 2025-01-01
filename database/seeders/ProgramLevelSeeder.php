<?php

namespace Database\Seeders;

use App\Models\ProgramLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programLevels = [
            [
                'name' => 'Bachelors (4 years) (BS)',
                'duration' => 4
            ],
            [
                'name' => 'B.Ed (1.5 Years) / PGD',
                'duration' => 1.5
            ],
            [
                'name' => 'MS/MPhil',
                'duration' => 2
            ],
            [
                'name' => 'PhD',
                'duration' => 3
            ],
        ];

        foreach ($programLevels as $programLevel) {
            ProgramLevel::create($programLevel);
        }
    }
}
