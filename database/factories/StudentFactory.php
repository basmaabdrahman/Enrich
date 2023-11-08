<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'img'=>$this->faker->image(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone'=>$this->faker->phoneNumber,
            'created_at'=>$this->faker->time(),
            'updated_at'=>$this->faker->time(),
        ];
    }
}
