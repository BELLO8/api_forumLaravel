<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SujetResource extends JsonResource
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
            'sujets'=>$this->sujets,
            'categorie'=>[
                'id'=>$this->categories->id,
                'categorie'=>$this->categories->categorie
            ],
        ];
    }
}
