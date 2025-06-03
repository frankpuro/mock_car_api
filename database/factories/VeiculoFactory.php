<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Faker\Provider\FakeCar;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
    $faker = app(Faker::class);
    $faker->addProvider(new FakeCar($faker));
        return [
            'modelo' => $faker->vehicleModel(),
            'marca' => $faker->vehicleBrand(),
            'ano' => $faker->biasedNumberBetween(1998, 2025, 'sqrt'),
            'descricao' => $faker->text(),
            'vendido' => $faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
