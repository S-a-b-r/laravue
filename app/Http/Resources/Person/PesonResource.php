<?php

namespace App\Http\Resources\Person;

use Illuminate\Http\Resources\Json\JsonResource;

class PesonResource extends JsonResource
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
            'name' => $this->name,
            'second_name' => $this->second_name,
            'age' => $this->age,
        ];
    }
}
