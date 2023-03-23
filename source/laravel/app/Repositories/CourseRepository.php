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
        return $this->entity->get();
    }

    public function getCourse(string $id)
    {
        return $this->entity->findOrFail($id);
    }
}
