<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CourseResource extends JsonResource
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
            'name' => $this->nome,
            'description' => $this->descricao,
            //'modules' => ModuleResource::collection($this->modules), //Retornando os modulos vinculados ao curso
            'modules' => ModuleResource::collection($this->whenLoaded('modules')), //Retornando os modulos vinculados ao curso caso carregue o With() da Repository
            'image' => $this->imagem ? Storage::url($this->imagem) : '',
        ];
    }
}
