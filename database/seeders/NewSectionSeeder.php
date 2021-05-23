<?php


namespace Database\Seeders;


use App\Models\NewsSection;
use Illuminate\Database\Seeder;

class NewSectionSeeder extends Seeder
{
    public function run()
    {
        NewsSection::factory()
            ->count(20)
            ->create();
    }
}
