<?php

namespace App\Repositories;

use App\Models\Course;

//Classe Repository sao responsaveis por armazenas as consultas da model, ou seja, as query, desde as simples ate complexas
class CourseRepository
{
    protected $entity;

    public function __construct(Course $model)
    {
        //Criando instancia da model Course
        $this->entity = $model;
    }

    public function getAllCourses()
    {
        return $this->entity->with('modules.lessons.views')->get(); //with() adiciona na mesma consulta, assim ja traz os modulos e aulas do curso, com base no relacionamento feito na Model
    }

    public function getCourse(string $id)
    {
        return $this->entity->with('modules.lessons')->findOrFail($id);
    }
}
