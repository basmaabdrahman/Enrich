<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
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
            'price'=>$this->faker->numberBetween(10,900),
            'content' => $this->faker->text(),
            'created_at'=>$this->faker->time(),
            'updated_at'=>$this->faker->time(),
        ];
    }
}
