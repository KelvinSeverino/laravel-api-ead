<?php

namespace App\Repositories;

use App\Models\Lesson;
use App\Repositories\Traits\RepositoryTrait;

//Classe Repository sao responsaveis por armazenas as consultas da model, ou seja, as query, desde as simples ate complexas
class LessonRepository
{
    use RepositoryTrait;

    protected $entity;

    public function __construct(Lesson $model)
    {
        //Criando instancia da model Course
        $this->entity = $model;
    }

    public function getLessonsByModuleId(string $moduleId)
    {
        return $this->entity
                    ->with('supports.replies') //with() adiciona na mesma consulta, assim ja traz os suportes e respostas da aula, com base no relacionamento feito na Model
                    ->where('module_id', $moduleId)
                    ->get();
    }

    public function getLesson(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function markLessonViewed(string $lessonId)
    {
        $user = $this->getUserAuth();

        //Busca na tabela se o user ja tem view marcada para a aula
        $view = $user->views()->where('lesson_id', $lessonId)->first();

        if($view){
            return $view->update([
                'qty' => $view->qty + 1 //Marca mais uma view na aula
            ]);
        }

        //
        return $user->views()->create([
            'lesson_id' => $lessonId
        ]);
    }
}
