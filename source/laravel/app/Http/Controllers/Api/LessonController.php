<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonView;
use App\Http\Resources\LessonResource;
use App\Repositories\LessonRepository;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $repository;

    public function __construct(LessonRepository $courseRepository)
    {
        //Criando instancia da CourseRepository
        $this->repository = $courseRepository;
    }

    public function index($moduleId)
    {
        $lessons = $this->repository->getLessonsByModuleId($moduleId);

        return LessonResource::collection($lessons);
    }

    public function show($lessonId)
    {
        return new LessonResource($this->repository->getLesson($lessonId));
    }

    public function viewed(StoreLessonView $request)
    {
        $this->repository->markLessonViewed($request->lesson);

        return response()->json(['success' => true]);
    }
}
