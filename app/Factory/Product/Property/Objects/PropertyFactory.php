<?php


namespace App\Factory\Product\Property\Objects;



use App\Factory\Factory;
use App\Product\Property\Objects\Value;

class PropertyFactory extends Factory
{
    public function definition(): array {
        return [
            'id' => $this->getId(),
            'name' => $this->faker->text(20),
            'value' => Value::factory()->generate(rand(1,5)),
            'typeId' => $this->faker->randomDigit,
            'typeOfChoiceId' => $this->faker->randomDigit,
        ];
    }

}
