<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;

//Classe Repository sao responsaveis por armazenas as consultas da model, ou seja, as query, desde as simples ate complexas
class SupportRepository
{
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

    private function getUserAuth(): User
    {
        //return auth()->user();
        return User::first();
    }
}
