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
            'views' => ViewResource::collection($this->whenLoaded('views')), //Retornando as views vinculados as aulas caso carregue o With() da Repository
        ];
    }
}
