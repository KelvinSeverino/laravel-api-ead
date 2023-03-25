<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), //Ira criar um novo Usuario ja relacionando ao Suporte
            'lesson_id' => Lesson::factory(), //Ira criar uma nova Aula ja relacionando ao Suporte
            'status' => 'P',
            'descricao' => $this->faker->sentence(20)
        ];
    }
}
