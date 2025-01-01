<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $boards = [
            ['name' => 'Federal Board of Intermediate and Secondary Education'],
            ['name' => 'Bise Bahawalpur'],
            ['name' => 'Bise Dera Ghazi Khan'],
            ['name' => 'Bise Faisalabad'],
            ['name' => 'Bise Gujranwala'],
            ['name' => 'Bise Lahore'],
            ['name' => 'Bise Multan'],
            ['name' => 'Bise Rawalpindi'],
            ['name' => 'Bise Sahiwal'],
            ['name' => 'Bise Sargodha'],
            ['name' => 'Bise Hyderabad'],
            ['name' => 'Bise Karachi'],
            ['name' => 'Bise Larkana'],
            ['name' => 'Bise Sukkur'],
            ['name' => 'Bise Shaheed Benazirabad'],
            ['name' => 'Bise Abbottabad'],
            ['name' => 'Bise Bannu'],
            ['name' => 'Bise Dera Ismail Khan'],
            ['name' => 'Bise Kohat'],
            ['name' => 'Bise Malakand'],
            ['name' => 'Bise Mardan'],
            ['name' => 'Bise Peshawar'],
            ['name' => 'Bise Swat'],
            ['name' => 'Bise Quetta'],
            ['name' => 'Bise Khuzdar'],
            ['name' => 'Bise Mirpur'],

        ];

        foreach ($boards as $board) {
            Board::create($board);
        }
    }
}
