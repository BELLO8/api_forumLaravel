<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'id'=>$this->id,
            'message'=>$this->message,
            'membre'=>[
                'id'=>$this->membres->id,
                'membre'=>$this->membres->pseudo
            ],
            'sujet'=>[
                'id'=>$this->sujets->id,
                'sujets'=>$this->sujets->sujets
            ],
        ];
    }
}
