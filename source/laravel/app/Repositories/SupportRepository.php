<?php

namespace App\Repositories;

use App\Models\Support;
use App\Repositories\Traits\RepositoryTrait;

//Classe Repository sao responsaveis por armazenas as consultas da model, ou seja, as query, desde as simples ate complexas
class SupportRepository
{
    use RepositoryTrait;
    
    protected $entity;

    public function __construct(Support $model)
    {
        //Criando instancia da model Module
        $this->entity = $model;
    }

    public function getSupports(array $filters = [])
    {
        return $this->getUserAuth()
                    ->supports()
                    ->where(function ($query) use ($filters) {
                        //Verifica se a requisicao trouxe parametro ID da aula
                        if (isset($filters['lesson'])) {
                            $query->where('lesson_id', $filters['lesson']); //Pesquisa por suportes que tenham ID da aula
                        }

                        //Verifica se a requisicao trouxe parametro ID do status
                        if (isset($filters['status'])) {
                            $query->where('status', $filters['status']);
                        }
                        
                        //Verifica se a requisicao trouxe parametro filter, a descricao
                        if (isset($filters['filter'])) {
                            $filter = $filters['filter'];
                            $query->where('descricao', 'LIKE', "%{$filter}%");
                        }
                    })
                    ->orderBy('updated_at')
                    ->get();
    }

    public function createNewSupport(array $data): Support
    {
        $support = $this->getUserAuth()
                ->supports()
                ->create([
                    'lesson_id' => $data['lesson'],
                    'descricao' => $data['description'],
                    'status' => $data['status'],
                ]);

        return $support;
    }

    public function createReplyToSupportId(string $supportId, array $data)
    {
        $user = $this->getUserAuth();
        return $this->getSupport($supportId)
                ->replies()
                ->create([
                    'descricao' => $data['description'],
                    'user_id' => $user->id,
                ]);
    }
    
    private function getSupport(string $id)
    {
        return $this->entity->findOrFail($id);
    }
}
