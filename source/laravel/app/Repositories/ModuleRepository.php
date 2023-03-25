<?php

namespace App\Repositories;

use App\Models\Module;

//Classe Repository sao responsaveis por armazenas as consultas da model, ou seja, as query, desde as simples ate complexas
class ModuleRepository
{
    protected $entity;

    public function __construct(Module $model)
    {
        //Criando instancia da model Module
        $this->entity = $model;
    }

    public function getMOdulesByCourseId(string $courseId)
    {
        return $this->entity
                    ->where('course_id',$courseId)
                    ->get();
    }
}
