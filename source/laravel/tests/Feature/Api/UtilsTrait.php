<?php

namespace Tests\Feature\Api;

use App\Models\User;

trait UtilsTrait
{
    public function createUser()
    {        
        $user = User::factory()->create();
        return $user;
    }

    public function createTokenUser()
    {        
        $user = $this->createUser();
        return $user->createToken('deviceTest')->plainTextToken;
    }

    public function defaultHeaders()
    {
        $token = $this->createTokenUser();
        return [            
            'Authorization' => "Bearer {$token}",
        ];
    }
}
