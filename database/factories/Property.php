<?php


namespace Database\Factories;


class Property
{
    public function definition(): array {
        return [
            'id' => $this->getId(),
            'value' => $this->faker->text(20),
            'description' => $this->faker->text(200),
            'propertyId' => $this->faker->randomDigit,
            'typeId' => $this->faker->randomDigit,
            'sort' => $this->faker->randomDigit,
        ];
    }
}
