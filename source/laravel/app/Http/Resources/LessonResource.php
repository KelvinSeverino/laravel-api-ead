<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'description' => $this->descricao,
            'video' => $this->video,
            'views' => $this->views, //Retornando as views vinculadas as aulas
        ];
    }
}
