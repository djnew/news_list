<?php
namespace Database\Factories;

use App\Models\NewsSection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class NewsSectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NewsSection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $name = $this->faker->text(21);

        return [
            'name' => $name,
            'code' => Str::slug($name),
            'state' => 1,
            'active_from' => Carbon::now()
        ];
    }
}
