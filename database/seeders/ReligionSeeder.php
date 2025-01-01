<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $religions = [
            ['name' => 'Christianity'],
            ['name' => 'Islam'],
            ['name' => 'Hinduism'],
            ['name' => 'Buddhism'],
            ['name' => 'Judaism'],
            ['name' => 'Other'],
        ];

        foreach ($religions as $religion) {
            Religion::create($religion);
        }
    }
}
