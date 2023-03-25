<?php

namespace App\Repositories;

use App\Models\Lesson;

//Classe Repository sao responsaveis por armazenas as consultas da model, ou seja, as query, desde as simples ate complexas
class LessonRepository
{
    protected $entity;

    public function __construct(Lesson $model)
    {
        //Criando instancia da model Course
        $this->entity = $model;
    }

    public function getLessonsByModuleId(string $moduleId)
    {
        return $this->entity
                    ->where('module_id', $moduleId)
                    ->get();
    }

    public function getLesson(string $id)
    {
        return $this->entity->findOrFail($id);
    }
}
