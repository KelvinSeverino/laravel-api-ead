<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $repository;

    public function __construct(CourseRepository $courseRepository)
    {
        //Criando instancia da CourseRepository
        $this->repository = $courseRepository;
    }

    public function index()
    {
        //Buscando os cursos cadastrados da Model Course
        $courses = $this->repository->getAllCourses();

        //Retornando dados do curso para a Resource, Classe responsavel por padronizar os retornos de API
        return CourseResource::collection($courses);
    }

    public function show($id)
    {
        //Buscan o curso pelo ID, caso nao encontre retorna erro 404
        $course = $this->repository->getCourse($id);

        //Retorna resultado
        return new CourseResource($course);
    }
}
