<?php

namespace Tests\Feature\Api\Auth;

use App\Models\User;
use Tests\Feature\Api\UtilsTrait;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use UtilsTrait;

    /**
     * Testando rota /auth com valor NULO.
     * @return void
     */
    public function test_fail_auth()
    {
        $response = $this->postJson('/auth', []); //Envia dados em JSON, simulando requisicao API

        $response->assertStatus(422); //Informa o STATUS HTTP CODE esperado da API
    }

    /**
     * Testando rota /auth com USER.
     * @return void
     */
    public function test_auth()
    {
        $user = User::factory()->create();

        //Envia dados em JSON, simulando requisicao API
        $response = $this->postJson('/auth', [
            'email' => $user->email,
            'password' => 'password',
            'device_name' => 'test'
        ]); 

        //$response->dump();

        $response->assertStatus(200); //Informa o STATUS HTTP CODE esperado da API
    }

    /**
     * Testando rota /logout com ERRO
     * @return void
     */
    public function test_error_logout()
    {
        //Envia dados em JSON, simulando requisicao API
        $response = $this->postJson('/logout'); 

        $response->assertStatus(401); //Informa o STATUS HTTP CODE esperado da API
    }

    /**
     * Testando rota /logout
     * @return void
     */
    public function test_logout()
    {
        $token = $this->createTokenUser();

        //Envia dados em JSON, simulando requisicao API
        $response = $this->postJson('/logout', [], [
            'Authorization' => "Bearer {$token}",
        ]); 

        $response->assertStatus(200); //Informa o STATUS HTTP CODE esperado da API
    }

    /**
     * Testando rota /me com ERRO
     * @return void
     */
    public function test_error_get_me()
    {
        //Pega dados em JSON, simulando requisicao API
        $response = $this->getJson('/me'); 

        $response->assertStatus(401); //Informa o STATUS HTTP CODE esperado da API
    }

    /**
     * Testando rota /me
     * @return void
     */
    public function test_get_me()
    {
        $token = $this->createTokenUser();

        //Pega dados em JSON, simulando requisicao API
        $response = $this->getJson('/me', [
            'Authorization' => "Bearer {$token}",
        ]); 

        $response->assertStatus(200); //Informa o STATUS HTTP CODE esperado da API
    }
}
