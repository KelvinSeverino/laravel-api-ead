<?php

namespace Tests\Feature\Api;

use Tests\Feature\Api\UtilsTrait;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Support;
use App\Models\Lesson;

class SupportTest extends TestCase
{
    use UtilsTrait;

    public function test_get_my_supports_unauthenticated()
    {
        $response = $this->getJson('/my-supports');

        $response->assertStatus(401);
    }

    public function test_get_my_supports()
    {
        $user = $this->createUser();
        $token = $user->createToken('deviceTest')->plainTextToken;

        Support::factory()->count(50)->create([
            'user_id' => $user->id
        ]);

        Support::factory()->count(50)->create();

        $response = $this->getJson('/my-supports', [
            'Authorization' => "Bearer {$token}",
        ]);

        $response->assertStatus(200)
                    ->assertJsonCount(50, 'data');
    }

    public function test_get_supports_unauthenticated()
    {
        $response = $this->getJson('/supports');

        $response->assertStatus(401);
    }

    public function test_get_supports()
    {
        Support::factory()->count(50)->create();

        $response = $this->getJson('/supports', $this->defaultHeaders());

        $response->assertStatus(200)
                    ->assertJsonCount(50, 'data');
    }

    public function test_get_supports_filter_lesson()
    {
        $lesson = Lesson::factory()->create();
        Support::factory()->count(50)->create();
        Support::factory()->count(10)->create([
            'lesson_id' => $lesson->id,
        ]);

        $payload = [
            'lesson' =>$lesson->id
        ];

        $response = $this->json('GET', '/supports', $payload, $this->defaultHeaders()); //Usando metodo json(), pois ele possibilita passar mais parametros do form via $payload

        $response->assertStatus(200)
                    ->assertJsonCount(10, 'data');
    }

    public function test_get_supports_filter_description()
    {
        $lesson = Lesson::factory()->create();
        Support::factory()->create([
            'lesson_id' => $lesson->id,
        ]);

        $payload = [
            'filter' => $lesson->descricao
        ];

        $response = $this->json('GET', '/supports', $payload, $this->defaultHeaders()); //Usando metodo json(), pois ele possibilita passar mais parametros do form via $payload

        $response->assertStatus(200);
    }

    public function test_get_supports_filter_status()
    {
        $lesson = Lesson::factory()->create();
        Support::factory()->create([
            'lesson_id' => $lesson->id,
        ]);

        $payload = [
            'status' => 'P'
        ];

        $response = $this->json('GET', '/supports', $payload, $this->defaultHeaders()); //Usando metodo json(), pois ele possibilita passar mais parametros do form via $payload

        $response->assertStatus(200);
    }
}
