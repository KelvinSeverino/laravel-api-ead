<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->name();

        return [
            'module_id' => Module::factory(), //Ira criar um novo modulo ja relacionando a aula
            'nome' => $name,
            'url' => Str::slug($name),
            'video' => Str::random()
        ];
    }
}
