<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('http://universities.hipolabs.com/search', [
            'country' => 'Pakistan',
        ]);

        $universities = $response->json();

        foreach ($universities as $university) {
            University::updateOrCreate(
                ['name' => $university['name']],
            );
        }
    }
}
