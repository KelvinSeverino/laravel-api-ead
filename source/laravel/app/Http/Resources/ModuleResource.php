<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => ucwords(strtolower($this->nome)),
            //'lessons' => LessonResource::collection($this->lessons), //Retornando as aulas vinculadas aos modulos
            'lessons' => LessonResource::collection($this->whenLoaded('lessons')), //Retornando as aulas vinculadas ao curso caso carregue o With() da Repository
        ];

    }
}
