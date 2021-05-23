<?php


namespace Database\Factories;


use App\Models\NewsElement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class NewsElementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NewsElement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $name = $this->faker->text(20);

        return [
            'name' => $name,
            'code' => Str::slug($name),
            'text' => $this->faker->text(1000),
            'state' => 1,
            'active_from' => Carbon::now(),
            'show_count' =>$this->faker->numberBetween(1, 1000)
        ];
    }
}
