<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        //Buscando os cursos cadastrados da Model Course
        $courses = Course::get();

        //Retornando dados do curso para a Resource, Classe responsavel por padronizar os retornos de API
        return CourseResource::collection($courses);
    }
}