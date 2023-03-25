<?php

namespace App\Repositories;

use App\Models\ReplySupport;
use App\Models\Support;
use App\Repositories\Traits\RepositoryTrait;

//Classe Repository sao responsaveis por armazenas as consultas da model, ou seja, as query, desde as simples ate complexas
class ReplySupportRepository
{
    use RepositoryTrait;

    protected $entity;

    public function __construct(ReplySupport $model)
    {
        //Criando instancia da model
        $this->entity = $model;
    }

    public function createReplyToSupport(array $data)
    {
        $user = $this->getUserAuth();

        // O modo abaixo gera acoplamento/dependencia entre repositories
        /*$support = app(SupportRepository::class)->getSupport($supportId);
        return $support
                ->replies()
                ->create([
                    'descricao' => $data['description'],
                    'user_id' => $user->id,
                ]);*/        
        
        return $this->entity
                    ->create([
                        'support_id' => $data['support'],
                        'descricao' => $data['description'],
                        'user_id' => $user->id,
                    ]);
    }
}
