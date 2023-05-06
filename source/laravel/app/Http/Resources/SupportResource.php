<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
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
            'status' => $this->status,
            'status_label' => $this->statusOptions[$this->status] ?? 'Not Found Status',
            'description' => $this->descricao,
            'user' => new UserResource($this->user),
            //'lesson' => new LessonResource($this->lesson),
            //'replies' => ReplySupportResource::collection($this->replies),
            'lesson' => LessonResource::collection($this->whenLoaded('lessons')), //Retornando a aula vinculada ao suporte caso carregue o With() da Repository
            'replies' => ReplySupportResource::collection($this->whenLoaded('replies')), //Retornando as respostas vinculadas ao suporte caso carregue o With() da Repository
            'date_update' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
