<?php


namespace Database\Seeders;


use App\Models\NewsElement;
use App\Models\NewsSection;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class NewElementSeeder extends Seeder
{
    public function run()
    {
        NewsElement::factory()
            ->count(100)
            ->state(new Sequence(
                fn () => ['news_section_id' => NewsSection::all()->random()],
            ))
            ->create();
    }
}
