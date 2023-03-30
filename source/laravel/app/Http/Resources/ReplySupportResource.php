<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplySupportResource extends JsonResource
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
            'description' => $this->descricao,
            'support' => new SupportResource($this->whenLoaded('support')), //$this->support referente ao metodo de relacionamento na Model ReplySupport
            'user' => new UserResource($this->user), //$this->user referente ao metodo de relacionamento na Model ReplySupport
        ];
    }
}
